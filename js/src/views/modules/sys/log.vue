<template>
  <div class="mod-log">
    <el-form :inline="true" :model="dataForm" @keyup.enter.native="getDataList()">
      <el-form-item>
        <el-input clearable placeholder="用户名" v-model="dataForm.key"></el-input>
      </el-form-item>
      <el-form-item>
        <el-input clearable placeholder="操作" v-model="dataForm.operation"></el-input>
      </el-form-item>
      <el-form-item>
        <el-button @click="getDataList()">查询</el-button>
      </el-form-item>
    </el-form>
    <el-table
      :data="dataList"
      border
      style="width: 100%"
      v-loading="dataListLoading">
      <el-table-column
        align="center"
        header-align="center"
        label="ID"
        prop="id"
        width="80">
      </el-table-column>
      <el-table-column
        align="center"
        header-align="center"
        label="用户名"
        prop="user_name"
        width="90">
      </el-table-column>
      <el-table-column
        align="center"
        header-align="center"
        label="用户操作"
        prop="operation">
      </el-table-column>
      <el-table-column
        :show-overflow-tooltip="true"
        align="center"
        header-align="center"
        label="请求方法"
        prop="method"
        width="90">
      </el-table-column>
      <el-table-column
        :show-overflow-tooltip="true"
        align="center"
        header-align="center"
        label="请求参数"
        prop="params"
        width="150">
      </el-table-column>
      <el-table-column
        :show-overflow-tooltip="true"
        align="center"
        header-align="center"
        label="响应数据"
        prop="response"
        width="150">
      </el-table-column>
      <el-table-column
        align="center"
        header-align="center"
        label="请求地址"
        prop="url"
        width="150">
      </el-table-column>
      <el-table-column
        align="center"
        header-align="center"
        label="IP地址"
        prop="ip"
        width="120">
      </el-table-column>
      <el-table-column
        align="center"
        header-align="center"
        label="创建时间"
        prop="create_time"
        width="180">
      </el-table-column>
    </el-table>
    <el-pagination
      :current-page="pageIndex"
      :page-size="pageSize"
      :page-sizes="[10, 20, 50, 100]"
      :total="totalPage"
      @current-change="currentChangeHandle"
      @size-change="sizeChangeHandle"
      layout="total, sizes, prev, pager, next, jumper">
    </el-pagination>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        dataForm: {
          key: '',
          operation: ''
        },
        dataList: [],
        pageIndex: 1,
        pageSize: 10,
        totalPage: 0,
        dataListLoading: false,
        selectionDataList: []
      }
    },
    created() {
      this.getDataList()
    },
    methods: {
      // 获取数据列表
      getDataList() {
        this.dataListLoading = true
        this.$http({
          url: this.$http.adornUrl('/api/logs'),
          method: 'get',
          params: this.$http.adornParams({
            'pageNum': this.pageIndex,
            'pageSize': this.pageSize,
            'user_name': this.dataForm.key || null,
            'operation': this.dataForm.operation || null
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
      sizeChangeHandle(val) {
        this.pageSize = val
        this.pageIndex = 1
        this.getDataList()
      },
      // 当前页
      currentChangeHandle(val) {
        this.pageIndex = val
        this.getDataList()
      }
    }
  }
</script>
