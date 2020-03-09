<template>
  <div>
    <el-form :inline="true" :model="dataForm" @keyup.enter.native="getDataList()">
      <el-form-item>
        <el-input clearable placeholder="内容" v-model="dataForm.userName"></el-input>
      </el-form-item>
      <el-form-item>
        <el-button @click="getDataList()">查询</el-button>
        <el-button @click="addOrUpdateHandle()" type="primary" v-if="isAuth('web:message:save')">新增</el-button>
        <el-button :disabled="dataListSelections.length <= 0" @click="deleteHandle()" type="danger"
                   v-if="isAuth('web:message:delete')">批量删除
        </el-button>
      </el-form-item>
    </el-form>
    <el-table
      :data="dataList"
      @selection-change="selectionChangeHandle"
      style="width: 100%;"
      v-loading="dataListLoading">
      <el-table-column
        align="center"
        header-align="center"
        type="selection"
        width="28">
      </el-table-column>
      <el-table-column type="expand" width="20">
        <template slot-scope="props">
          <el-form class="demo-table-expand" label-position="left">
            <el-form-item label="内容：">
              <span>{{ props.row.content }}</span>
            </el-form-item>
            <el-form-item label="回复：">
              <span>{{ props.row.reply }}</span>
            </el-form-item>
          </el-form>
        </template>
      </el-table-column>

      <el-table-column
        align="center"
        header-align="center"
        label="ID"
        prop="id"
        width="80">
      </el-table-column>

      <el-table-column
        header-align="center"
        label="内容"
        prop="content">
      </el-table-column>

      <el-table-column
        :show-overflow-tooltip="true"
        header-align="center"
        label="回复"
        prop="reply">
      </el-table-column>

      <el-table-column
        align="center"
        header-align="center"
        label="创建时间"
        prop="create_time"
        width="150">
      </el-table-column>

      <el-table-column
        align="center"
        fixed="right"
        header-align="center"
        label="操作"
        width="150">
        <template slot-scope="scope">
          <el-button @click="addOrUpdateHandle(scope.row.id)" size="small" type="text" v-if="isAuth('web:message:update')">
            修改
          </el-button>
          <el-button @click="deleteHandle(scope.row.id)" size="small" type="text" v-if="isAuth('web:message:delete')">删除
          </el-button>
        </template>
      </el-table-column>
    </el-table>
    <el-pagination
      :current-page="pageIndex"
      :page-size="pageSize"
      :page-sizes="[5, 10, 15, 50]"
      :total="totalPage"
      @current-change="currentChangeHandle"
      @size-change="sizeChangeHandle"
      layout="total, sizes, prev, pager, next, jumper">
    </el-pagination>
    <!-- 弹窗, 新增 / 修改 -->
    <add-or-update @refreshDataList="getDataList" ref="addOrUpdate" v-if="addOrUpdateVisible"></add-or-update>
  </div>
</template>

<script>
  import AddOrUpdate from './message-add-or-update'

  export default {
    data () {
      return {
        dataForm: {
          userName: ''
        },
        dataList: [],
        pageIndex: 1,
        pageSize: 5,
        totalPage: 0,
        dataListLoading: false,
        dataListSelections: [],
        addOrUpdateVisible: false
      }
    },
    components: {
      AddOrUpdate
    },
    activated () {
      this.getDataList()
    },
    methods: {
      // 获取数据列表
      getDataList () {
        this.dataListLoading = true
        this.$http({
          url: this.$http.adornUrl('/api/admin/messages'),
          method: 'get',
          params: this.$http.adornParams({
            'pageNum': this.pageIndex,
            'pageSize': this.pageSize,
            'content': this.dataForm.userName || null
          })
        }).then(({data}) => {
          if (data && data.code === 200) {
            this.dataList = data.result.data
            this.totalPage = data.result.total
          } else {
            this.dataList = []
            this.totalPage = 0
          }
          this.dataListLoading = false
        })
      },
      // 每页数
      sizeChangeHandle (val) {
        this.pageSize = val
        this.pageIndex = 1
        this.getDataList()
      },
      // 当前页
      currentChangeHandle (val) {
        this.pageIndex = val
        this.getDataList()
      },
      // 多选
      selectionChangeHandle (val) {
        this.dataListSelections = val
      },
      // 新增 / 修改
      addOrUpdateHandle (id) {
        this.addOrUpdateVisible = true
        this.$nextTick(() => {
          this.$refs.addOrUpdate.init(id)
        })
      },
      // 删除
      deleteHandle (id) {
        var ids = id ? [id] : this.dataListSelections.map(item => {
          return item.id
        })
        this.$confirm(`确定对[id=${ids.join(',')}]进行[${id ? '删除' : '批量删除'}]操作?`, '提示', {
          confirmButtonText: '确定',
          cancelButtonText: '取消',
          type: 'warning'
        }).then(() => {
          this.$http({
            url: this.$http.adornUrl('/api/admin/messages'),
            method: 'delete',
            data: this.$http.adornData(ids, false)
          }).then(({data}) => {
            if (data && data.code === 200) {
              this.$message({
                message: '操作成功',
                type: 'success',
                duration: 1500,
                onClose: () => {
                  this.getDataList()
                }
              })
            } else {
              this.$message.error(data.msg)
            }
          })
        }).catch(() => {
        })
      }
    }
  }
</script>
