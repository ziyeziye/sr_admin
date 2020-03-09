<template>
  <el-dialog
    :close-on-click-modal="false"
    :title="!dataForm.id ? '新增' : '修改'"
    :visible.sync="visible">
    <el-form :model="dataForm" :rules="dataRule" @keyup.enter.native="dataFormSubmit()" label-width="80px"
             ref="dataForm">
      <el-form-item label="问题" prop="name">
        <el-input placeholder="问题" v-model="dataForm.name"></el-input>
      </el-form-item>

      <el-form-item label="答案" prop="content">
        <el-input type="textarea" rows="5" placeholder="答案" v-model="dataForm.content"></el-input>
      </el-form-item>

    </el-form>
    <span class="dialog-footer" slot="footer">
      <el-button @click="visible = false">取消</el-button>
      <el-button @click="dataFormSubmit()" type="primary">确定</el-button>
    </span>
  </el-dialog>
</template>

<script>
  export default {
    data () {
      return {
        visible: false,
        dataForm: {
          id: 0,
          name: '',
          content: ''
        },
        dataRule: {
          name: [
            {required: true, message: '问题不能为空', trigger: 'blur'}
          ],
          content: [
            {required: true, message: '答案不能为空', trigger: 'blur'}
          ]
        }
      }
    },
    methods: {
      init (id) {
        this.dataForm.id = id || 0
        this.visible = true
        this.$nextTick(() => {
          this.$refs['dataForm'].resetFields()
          if (this.dataForm.id) {
            this.$http({
              url: this.$http.adornUrl(`/api/admin/faqs/${this.dataForm.id}`),
              method: 'get',
              params: this.$http.adornParams({
                'id': this.dataForm.id
              })
            }).then(({data}) => {
              if (data && data.code === 200) {
                this.dataForm.content = data.result.content
                this.dataForm.name = data.result.name
              }
            })
          }
        })
      },
      // 表单提交
      dataFormSubmit () {
        this.$refs['dataForm'].validate((valid) => {
          if (valid) {
            this.$http({
              url: this.$http.adornUrl(`/api/admin/faqs${!this.dataForm.id ? '' : '/' + this.dataForm.id}`),
              method: `${!this.dataForm.id ? 'post' : 'put'}`,
              data: this.$http.adornData({
                'id': this.dataForm.id || null,
                'name': this.dataForm.name,
                'content': this.dataForm.content
              })
            }).then(({data}) => {
              if (data && data.code === 200) {
                this.$message({
                  message: '操作成功',
                  type: 'success',
                  duration: 1500,
                  onClose: () => {
                    this.visible = false
                    this.$emit('refreshDataList')
                  }
                })
              } else {
                this.$message.error(data.msg)
              }
            })
          }
        })
      }
    }
  }
</script>
