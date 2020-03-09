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
        option: {
          dicUrl: 'http://web.dtguai.com/web/modules/controller/courseTrainingUser/infoByKey',
          column: [
            {
              'type': 'input',
              'label': '单行文本',
              'span': 24,
              'display': true,
              'prop': 'id'
            }

          ]
        }
      }
    }
  }
</script>
