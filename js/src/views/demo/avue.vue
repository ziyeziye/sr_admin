<template>
  <div>


    <avue-form ref="form" v-model="obj" :option="option" @reset-change="emptytChange" @submit="submit">

    </avue-form>

  </div>
</template>

<script>
  export default {
    data () {
      return {
        obj: {},
        sizeValue: ''
      }
    },
    computed: {
      option () {
        return {
          column: [
            {
              'type': 'input',
              'label': '单行文本',
              'span': 24,
              'display': true,
              'prop': '1568858957806_68306',
              valueDefault: 'cx911'
            },
            {
              'type': 'tree',
              'label': '树形选择器',
              'span': 24,
              'display': true,
              'dicData': [
                {
                  'label': '选项一',
                  'value': 0,
                  'children': [
                    {
                      'label': '选项1-1',
                      'value': 11
                    },
                    {
                      'label': '选项1-2',
                      'value': 12
                    }
                  ]
                },
                {
                  'label': '选项二',
                  'value': 1
                },
                {
                  'label': '选项三',
                  'value': 2
                }
              ],
              'prop': '1568864236835_56524'
            },
            {
              'type': 'date',
              'label': '日期',
              'span': 24,
              'display': true,
              'format': 'yyyy-MM-dd',
              'valueFormat': 'yyyy-MM-dd',
              'prop': '1568864261401_45605'
            },
            {
              'type': 'month',
              'label': '月',
              'span': 24,
              'display': true,
              'format': 'MM',
              'valueFormat': 'MM',
              'prop': '1568864262680_11816'
            },
            {
              'type': 'timerange',
              'label': '时间范围',
              'span': 24,
              'display': true,
              'format': 'HH:mm:ss',
              'valueFormat': 'HH:mm:ss',
              'prop': '1568864264054_8053'
            },
            {
              'type': 'datetimerange',
              'label': '日期时间范围',
              'span': 24,
              'display': true,
              'format': 'yyyy-MM-dd HH:mm:ss',
              'valueFormat': 'yyyy-MM-dd HH:mm:ss',
              'prop': '1568864265271_99986'
            },
            {
              'type': 'time',
              'label': '时间',
              'span': 24,
              'display': true,
              'format': 'HH:mm:ss',
              'valueFormat': 'HH:mm:ss',
              'prop': '1568864271090_53058',
              'required': true,
              'rules': [
                {
                  'required': true,
                  'message': '时间必须填写'
                }
              ],
              'disabled': true
            },
            {
              'type': 'week',
              'label': '周',
              'span': 24,
              'display': true,
              'format': 'yyyy 第 WW 周',
              'prop': '1568864270279_13219'
            },
            {
              'type': 'daterange',
              'label': '日期范围',
              'span': 24,
              'display': true,
              'format': 'yyyy-MM-dd',
              'valueFormat': 'yyyy-MM-dd',
              'prop': '1568864266322_87879'
            },
            {
              'type': 'date',
              'label': '日期',
              'span': 24,
              'display': true,
              'format': 'yyyy-MM-dd',
              'valueFormat': 'yyyy-MM-dd',
              'prop': '1568864268439_27774'
            },
            {
              'type': 'month',
              'label': '月',
              'span': 24,
              'display': true,
              'format': 'MM',
              'valueFormat': 'MM',
              'prop': '1568864269339_6849'
            },
            {
              'type': 'rate',
              'label': '评价',
              'span': 24,
              'display': true,
              'max': 5,
              'valueDefault': 0,
              'texts': [
                '极差',
                '失望',
                '一般',
                '满意',
                '惊喜'
              ],
              'colors': [
                '#99A9BF',
                '#F7BA2A',
                '#FF9900'
              ],
              'prop': '1568887210763_81215'
            },
            {
              'type': 'year',
              'label': '年',
              'span': 24,
              'display': true,
              'format': 'yyyy',
              'valueFormat': 'yyyy',
              'prop': '1568864267316_42856'
            }
          ],
          'labelPosition': 'left',
          'labelWidth': 120,
          'gutter': 0,
          'menuBtn': false,
          'submitBtn': false,
          'submitSize': 'medium',
          'submitText': '提交',
          'emptyBtn': false,
          'emptySize': 'medium',
          'emptyText': '清空',
          'menuPosition': 'center'
        }
      }
    },
    mounted () {
      this.obj.username = 'smallwei'
      this.obj.switch = 0
      this.obj.phone = '17547400800'
    },
    methods: {
      emptytChange () {
        this.$message.success('清空方法回调')
      },
      submit () {
        this.$message.success('当前数据' + JSON.stringify(this.obj))
      },
      tip () {
        this.$message.success('自定义按钮')
      }
    }
  }
</script>
