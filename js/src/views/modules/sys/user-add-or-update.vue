<template>
  <el-dialog
    :close-on-click-modal="false"
    :title="!dataForm.id ? '新增' : '修改'"
    :visible.sync="visible">
    <el-form :model="dataForm" :rules="dataRule" @keyup.enter.native="dataFormSubmit()" label-width="80px"
             ref="dataForm">
      <el-form-item label="用户名" prop="name">
        <el-input placeholder="登录帐号" v-model="dataForm.name"></el-input>
      </el-form-item>
      <el-form-item :class="{ 'is-required': !dataForm.id }" label="密码" prop="password">
        <el-input placeholder="密码" type="password" v-model="dataForm.password"></el-input>
      </el-form-item>
      <el-form-item :class="{ 'is-required': !dataForm.id }" label="确认密码" prop="comfirmPassword">
        <el-input placeholder="确认密码" type="password" v-model="dataForm.comfirmPassword"></el-input>
      </el-form-item>
      <el-form-item label="邮箱" prop="email">
        <el-input placeholder="邮箱" v-model="dataForm.email"></el-input>
      </el-form-item>
      <el-form-item label="手机号" prop="mobile">
        <el-input placeholder="手机号" v-model="dataForm.mobile"></el-input>
      </el-form-item>
      <el-form-item label="角色" prop="roleIdList" size="mini">
        <el-checkbox-group v-model="dataForm.roleIdList">
          <el-checkbox :key="role.id" :label="role.id" v-for="role in roleList">{{ role.role_name }}</el-checkbox>
        </el-checkbox-group>
      </el-form-item>
      <el-form-item label="状态" prop="status" size="mini">
        <el-radio-group v-model="dataForm.status">
          <el-radio :label="0">禁用</el-radio>
          <el-radio :label="1">正常</el-radio>
        </el-radio-group>
      </el-form-item>
    </el-form>
    <span class="dialog-footer" slot="footer">
      <el-button @click="visible = false">取消</el-button>
      <el-button @click="dataFormSubmit()" type="primary">确定</el-button>
    </span>
  </el-dialog>
</template>

<script>
  import {isEmail, isMobile} from '@/utils/validate'

  export default {
    data () {
      var validatePassword = (rule, value, callback) => {
        if (!this.dataForm.id && !/\S/.test(value)) {
          callback(new Error('密码不能为空'))
        } else {
          callback()
        }
      }
      var validateComfirmPassword = (rule, value, callback) => {
        if (!this.dataForm.id && !/\S/.test(value)) {
          callback(new Error('确认密码不能为空'))
        } else if (this.dataForm.password !== value) {
          callback(new Error('确认密码与密码输入不一致'))
        } else {
          callback()
        }
      }
      var validateEmail = (rule, value, callback) => {
        if (!isEmail(value)) {
          callback(new Error('邮箱格式错误'))
        } else {
          callback()
        }
      }
      var validateMobile = (rule, value, callback) => {
        if (!isMobile(value)) {
          callback(new Error('手机号格式错误'))
        } else {
          callback()
        }
      }
      return {
        visible: false,
        roleList: [],
        dataForm: {
          id: 0,
          name: '',
          password: '',
          comfirmPassword: '',
          email: '',
          mobile: '',
          roleIdList: [],
          status: 1
        },
        dataRule: {
          name: [
            {required: true, message: '用户名不能为空', trigger: 'blur'}
          ],
          password: [
            {validator: validatePassword, trigger: 'blur'}
          ],
          comfirmPassword: [
            {validator: validateComfirmPassword, trigger: 'blur'}
          ],
          email: [
            {required: true, message: '邮箱不能为空', trigger: 'blur'},
            {validator: validateEmail, trigger: 'blur'}
          ],
          mobile: [
            {required: true, message: '手机号不能为空', trigger: 'blur'},
            {validator: validateMobile, trigger: 'blur'}
          ]
        }
      }
    },
    methods: {
      init (id) {
        this.dataForm.id = id || 0
        this.$http({
          url: this.$http.adornUrl('/api/roles'),
          method: 'get',
          params: this.$http.adornParams()
        }).then(({data}) => {
          this.roleList = data && data.code === 200 ? data.result : []
        }).then(() => {
          this.visible = true
          this.$nextTick(() => {
            this.$refs['dataForm'].resetFields()
          })
        }).then(() => {
          if (this.dataForm.id) {
            this.$http({
              url: this.$http.adornUrl(`/api/admin/${this.dataForm.id}/role`),
              method: 'get',
              params: this.$http.adornParams({
                'id': this.dataForm.id
              })
            }).then(({data}) => {
              if (data && data.code === 200) {
                this.dataForm.name = data.result.name
                this.dataForm.email = data.result.email
                this.dataForm.mobile = data.result.mobile
                this.dataForm.roleIdList = data.result.roleIdList
                this.dataForm.status = data.result.status
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
              url: this.$http.adornUrl(`/api/admin${!this.dataForm.id ? '' : '/' + this.dataForm.id}`),
              method: `${!this.dataForm.id ? 'post' : 'put'}`,
              data: this.$http.adornData({
                'id': this.dataForm.id || null,
                'name': this.dataForm.name,
                'password': this.dataForm.password || null,
                'email': this.dataForm.email,
                'mobile': this.dataForm.mobile,
                'status': this.dataForm.status,
                'roleIdList': this.dataForm.roleIdList
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
