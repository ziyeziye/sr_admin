<template>
  <el-dialog
    :close-on-click-modal="false"
    :title="!dataForm.id ? '新增' : '修改'"
    :visible.sync="visible">
    <el-form :model="dataForm" :rules="dataRule" @keyup.enter.native="dataFormSubmit()" label-width="80px"
             ref="dataForm">
      <el-form-item label="类型" prop="type">
        <el-radio-group v-model="dataForm.type">
          <el-radio :key="index" :label="index" v-for="(type, index) in dataForm.typeList">{{ type }}</el-radio>
        </el-radio-group>
      </el-form-item>
      <el-form-item :label="dataForm.typeList[dataForm.type] + '名称'" prop="name">
        <el-input :placeholder="dataForm.typeList[dataForm.type] + '名称'" v-model="dataForm.name"></el-input>
      </el-form-item>
      <el-form-item label="上级菜单" prop="parentName">
        <el-popover
          placement="bottom-start"
          ref="menuListPopover"
          trigger="click">
          <el-tree
            :data="menuList"
            :default-expand-all="true"
            :expand-on-click-node="false"
            :highlight-current="true"
            :props="menuListTreeProps"
            @current-change="menuListTreeCurrentChangeHandle"
            node-key="id"
            ref="menuListTree">
          </el-tree>
        </el-popover>
        <el-input :readonly="true" class="menu-list__input" placeholder="点击选择上级菜单" v-model="dataForm.parentName"
                  v-popover:menuListPopover></el-input>
      </el-form-item>
      <el-form-item label="菜单路由" prop="url" v-if="dataForm.type === 1">
        <el-input placeholder="菜单路由" v-model="dataForm.url"></el-input>
      </el-form-item>
      <el-form-item label="授权标识" prop="perms" v-if="dataForm.type !== 0">
        <el-input placeholder="多个用逗号分隔, 如: user:list,user:create" v-model="dataForm.perms"></el-input>
      </el-form-item>
      <el-form-item label="排序号" prop="orders" v-if="dataForm.type !== 2">
        <el-input-number :min="0" controls-position="right" label="排序号" v-model="dataForm.orders"></el-input-number>
      </el-form-item>
      <el-form-item label="菜单图标" prop="icon" v-if="dataForm.type !== 2">
        <el-row>
          <el-col :span="22">
            <el-popover
              placement="bottom-start"
              popper-class="mod-menu__icon-popover"
              ref="iconListPopover"
              trigger="click">
              <div class="mod-menu__icon-list">
                <el-button
                  :class="{ 'is-active': item === dataForm.icon }"
                  :key="index"
                  @click="iconActiveHandle(item)"
                  v-for="(item, index) in iconList">
                  <icon-svg :name="item"></icon-svg>
                </el-button>
              </div>
            </el-popover>
            <el-input :readonly="true" class="icon-list__input" placeholder="菜单图标名称" v-model="dataForm.icon"
                      v-popover:iconListPopover></el-input>
          </el-col>
          <el-col :span="2" class="icon-list__tips">
          </el-col>
        </el-row>
      </el-form-item>
    </el-form>
    <span class="dialog-footer" slot="footer">
      <el-button @click="visible = false">取消</el-button>
      <el-button @click="dataFormSubmit()" type="primary">确定</el-button>
    </span>
  </el-dialog>
</template>

<script>
  import {treeDataTranslate} from '@/utils'
  import Icon from '@/icons'

  export default {
    data () {
      var validateUrl = (rule, value, callback) => {
        if (this.dataForm.type === 1 && !/\S/.test(value)) {
          callback(new Error('菜单URL不能为空'))
        } else {
          callback()
        }
      }
      return {
        visible: false,
        dataForm: {
          id: 0,
          type: 1,
          typeList: ['目录', '菜单', '按钮'],
          name: '',
          parentId: 0,
          parentName: '',
          url: '',
          perms: '',
          orders: 999,
          icon: '',
          iconList: []
        },
        dataRule: {
          name: [
            {required: true, message: '菜单名称不能为空', trigger: 'blur'}
          ],
          parentName: [
            {required: true, message: '上级菜单不能为空', trigger: 'change'}
          ],
          url: [
            {validator: validateUrl, trigger: 'blur'}
          ]
        },
        menuList: [],
        menuListTreeProps: {
          label: 'name',
          children: 'children'
        }
      }
    },
    created () {
      this.iconList = Icon.getNameList()
    },
    methods: {
      init (id) {
        this.dataForm.id = id || 0
        this.$http({
          url: this.$http.adornUrl('/api/admin/menus/group'),
          method: 'get',
          params: this.$http.adornParams()
        }).then(({data}) => {
          this.menuList = treeDataTranslate(data.result, 'id', 'parent_id')
        }).then(() => {
          this.visible = true
          this.$nextTick(() => {
            this.$refs['dataForm'].resetFields()
          })
        }).then(() => {
          if (!this.dataForm.id) {
            // 新增
            this.menuListTreeSetCurrentNode()
          } else {
            // 修改
            this.$http({
              url: this.$http.adornUrl(`/api/admin/menus/${this.dataForm.id}`),
              method: 'get',
              params: this.$http.adornParams({
                'id': this.dataForm.id
              })
            }).then(({data}) => {
              this.dataForm.id = data.result.id
              this.dataForm.type = data.result.type
              this.dataForm.name = data.result.name
              this.dataForm.parentId = data.result.parent_id
              this.dataForm.url = data.result.url
              this.dataForm.perms = data.result.perms
              this.dataForm.orders = data.result.orders
              this.dataForm.icon = data.result.icon
              this.menuListTreeSetCurrentNode()
            })
          }
        })
      },
      // 菜单树选中
      menuListTreeCurrentChangeHandle (data, node) {
        this.dataForm.parentId = data.id
        this.dataForm.parentName = data.name
      },
      // 菜单树设置当前选中节点
      menuListTreeSetCurrentNode () {
        this.$refs.menuListTree.setCurrentKey(this.dataForm.parentId)
        this.dataForm.parentName = (this.$refs.menuListTree.getCurrentNode() || {})['name']
      },
      // 图标选中
      iconActiveHandle (iconName) {
        this.dataForm.icon = iconName
      },
      // 表单提交
      dataFormSubmit () {
        this.$refs['dataForm'].validate((valid) => {
          if (valid) {
            this.$http({
              url: this.$http.adornUrl(`/api/admin/menus${!this.dataForm.id ? '' : '/' + this.dataForm.id}`),
              method: `${!this.dataForm.id ? 'post' : 'put'}`,
              data: this.$http.adornData({
                'id': this.dataForm.id || undefined,
                'type': this.dataForm.type,
                'name': this.dataForm.name,
                'parent_id': this.dataForm.parentId,
                'url': this.dataForm.url,
                'perms': this.dataForm.perms,
                'orders': this.dataForm.orders,
                'icon': this.dataForm.icon
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

<style lang="scss">
  .mod-menu {
    .menu-list__input,
    .icon-list__input {
      > .el-input__inner {
        cursor: pointer;
      }
    }

    &__icon-popover {
      max-width: 370px;
    }

    &__icon-list {
      max-height: 180px;
      padding: 0;
      margin: -8px 0 0 -8px;

      > .el-button {
        padding: 8px;
        margin: 8px 0 0 8px;

        > span {
          display: inline-block;
          vertical-align: middle;
          width: 18px;
          height: 18px;
          font-size: 18px;
        }
      }
    }

    .icon-list__tips {
      font-size: 18px;
      text-align: center;
      color: #e6a23c;
      cursor: pointer;
    }
  }
</style>
