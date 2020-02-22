
**大头怪app-web-api**


**简介**：<p>接口监控平台</p>


**HOST**:web.dtguai.com

**联系人**:guo

**Version**:1.0

**接口路径**：/v2/api-docs?group=dtguai-web-api


# CourseTrainingUser-用户培训班-接口

## 删除

**接口描述**:删除

**接口地址**:`/web/modules/controller/courseTrainingUser/delete`


**请求方式**：`DELETE`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|ids| 主键id  | body | true |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |object  |    |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
| 1022 | id不能为空  ||
## 根据主键查询

**接口描述**:根据主键查询

**接口地址**:`/web/modules/controller/courseTrainingUser/infoByKey`


**请求方式**：`GET`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|id| 主键id  | query | true |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"courseTrainingId": 0,
		"createTime": "",
		"id": 0,
		"userId": 0
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |CourseTrainingUser  | CourseTrainingUser   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**CourseTrainingUser**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|courseTrainingId | 培训班id   |integer(int32)  |    |
|createTime | 创建时间   |string(date-time)  |    |
|id | 主键   |integer(int32)  |    |
|userId | 用户id   |integer(int32)  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«CourseTrainingUser»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
| 1022 | id不能为空  ||
## 分页查询-返回PageInfo

**接口描述**:分页查询-返回PageInfo

**接口地址**:`/web/modules/controller/courseTrainingUser/list`


**请求方式**：`GET`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|courseTrainingId| 培训班id  | query | false |integer  |    |
|createTime| 创建时间  | query | false |string  |    |
|id| 主键  | query | false |integer  |    |
|userId| 用户id  | query | false |integer  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"endRow": 0,
		"hasNextPage": true,
		"hasPreviousPage": true,
		"isFirstPage": true,
		"isLastPage": true,
		"list": [
			{
				"courseTrainingId": 0,
				"createTime": "",
				"id": 0,
				"userId": 0
			}
		],
		"navigateFirstPage": 0,
		"navigateLastPage": 0,
		"navigatePages": 0,
		"navigatepageNums": [],
		"nextPage": 0,
		"pageNum": 0,
		"pageSize": 0,
		"pages": 0,
		"prePage": 0,
		"size": 0,
		"startRow": 0,
		"total": 0
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |PageInfo«CourseTrainingUser»  | PageInfo«CourseTrainingUser»   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**PageInfo«CourseTrainingUser»**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|endRow |    |integer(int32)  |    |
|hasNextPage |    |boolean  |    |
|hasPreviousPage |    |boolean  |    |
|isFirstPage |    |boolean  |    |
|isLastPage |    |boolean  |    |
|list |    |array  | CourseTrainingUser   |
|navigateFirstPage |    |integer(int32)  |    |
|navigateLastPage |    |integer(int32)  |    |
|navigatePages |    |integer(int32)  |    |
|navigatepageNums |    |array  |    |
|nextPage |    |integer(int32)  |    |
|pageNum |    |integer(int32)  |    |
|pageSize |    |integer(int32)  |    |
|pages |    |integer(int32)  |    |
|prePage |    |integer(int32)  |    |
|size |    |integer(int32)  |    |
|startRow |    |integer(int32)  |    |
|total |    |integer(int64)  |    |

**CourseTrainingUser**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|courseTrainingId | 培训班id   |integer(int32)  |    |
|createTime | 创建时间   |string(date-time)  |    |
|id | 主键   |integer(int32)  |    |
|userId | 用户id   |integer(int32)  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«PageInfo«CourseTrainingUser»»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 添加

**接口描述**:添加

**接口地址**:`/web/modules/controller/courseTrainingUser/save`


**请求方式**：`POST`


**consumes**:`["application/json"]`


**produces**:`["application/json;charset=UTF-8"]`


**请求示例**：
```json
{
	"courseTrainingId": 0,
	"createTime": "",
	"userId": 0
}
```


**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|courseTrainingUser| courseTrainingUser  | body | true |AddCourseTrainingUserForm  | AddCourseTrainingUserForm   |

**schema属性说明**



**AddCourseTrainingUserForm**

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|courseTrainingId| 培训班id  | body | false |integer(int32)  |    |
|createTime| 创建时间  | body | false |string(date-time)  |    |
|userId| 用户id  | body | false |integer(int32)  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": 0,
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |integer(int32)  | integer(int32)   |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«int»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 更新

**接口描述**:更新

**接口地址**:`/web/modules/controller/courseTrainingUser/update`


**请求方式**：`PUT`


**consumes**:`["application/json"]`


**produces**:`["application/json;charset=UTF-8"]`


**请求示例**：
```json
{
	"courseTrainingId": 0,
	"createTime": "",
	"id": 0,
	"userId": 0
}
```


**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|courseTrainingUser| courseTrainingUser  | body | true |CourseTrainingUserForm  | CourseTrainingUserForm   |

**schema属性说明**



**CourseTrainingUserForm**

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|courseTrainingId| 培训班id  | body | false |integer(int32)  |    |
|createTime| 创建时间  | body | false |string(date-time)  |    |
|id| 主键  | body | false |integer(int32)  |    |
|userId| 用户id  | body | false |integer(int32)  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |object  |    |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
# test

## 根据json获取sign和dataSecret

**接口描述**:根据json获取sign和dataSecret

**接口地址**:`/api/test/sd`


**请求方式**：`POST`


**consumes**:`["application/json"]`


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|json| json  | body | true |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"dataSecret": "",
		"sign": "",
		"timestamp": ""
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |Test  | Test   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**Test**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|dataSecret | 加密数据   |string  |    |
|sign | 数字签名   |string  |    |
|timestamp | 时间戳   |string  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«Test»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
# web-fdfs-文件上传接口


## 删除附件

**接口描述**:根据ID删除附件

**接口地址**:`/web/fdfs/controller/fdfs/delete`


**请求方式**：`DELETE`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`


**请求示例**：
```json
[
	0
]
```


**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|id| 主键id  |  | true |string  |    |
|ids| ids  | body | true |array  | integer   |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |object  |    |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
| 1022 | id不能为空  ||
## 下载附件

**接口描述**:根据ID下载附件

**接口地址**:`/web/fdfs/controller/fdfs/download`


**请求方式**：`GET`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|id| 附件ID  | query | true |string  |    |

**响应示例**:

```json

```

**响应参数**:


暂无





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  ||
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
| 1022 | id不能为空  ||
## 分页查询-返回PageInfo

**接口描述**:分页查询-返回PageInfo

**接口地址**:`/web/fdfs/controller/fdfs/list`


**请求方式**：`GET`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|createId| 创建人id  | query | false |integer  |    |
|createTime| 创建时间  | query | false |string  |    |
|fastFileId| fdfs_id  | query | false |string  |    |
|groupName| 组名  | query | false |string  |    |
|id| 主键  | query | false |integer  |    |
|name| 名称  | query | false |string  |    |
|size| 大小  | query | false |string  |    |
|type| 状态  | query | false |integer  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"endRow": 0,
		"hasNextPage": true,
		"hasPreviousPage": true,
		"isFirstPage": true,
		"isLastPage": true,
		"list": [
			{
				"createId": 0,
				"createTime": "",
				"fastFileId": "",
				"groupName": "",
				"id": 0,
				"name": "",
				"size": "",
				"type": 0,
				"url": ""
			}
		],
		"navigateFirstPage": 0,
		"navigateLastPage": 0,
		"navigatePages": 0,
		"navigatepageNums": [],
		"nextPage": 0,
		"pageNum": 0,
		"pageSize": 0,
		"pages": 0,
		"prePage": 0,
		"size": 0,
		"startRow": 0,
		"total": 0
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |PageInfo«SysDefFdfs»  | PageInfo«SysDefFdfs»   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**PageInfo«SysDefFdfs»**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|endRow |    |integer(int32)  |    |
|hasNextPage |    |boolean  |    |
|hasPreviousPage |    |boolean  |    |
|isFirstPage |    |boolean  |    |
|isLastPage |    |boolean  |    |
|list |    |array  | SysDefFdfs   |
|navigateFirstPage |    |integer(int32)  |    |
|navigateLastPage |    |integer(int32)  |    |
|navigatePages |    |integer(int32)  |    |
|navigatepageNums |    |array  |    |
|nextPage |    |integer(int32)  |    |
|pageNum |    |integer(int32)  |    |
|pageSize |    |integer(int32)  |    |
|pages |    |integer(int32)  |    |
|prePage |    |integer(int32)  |    |
|size |    |integer(int32)  |    |
|startRow |    |integer(int32)  |    |
|total |    |integer(int64)  |    |

**SysDefFdfs**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|createId | 创建人id   |integer(int32)  |    |
|createTime | 创建时间   |string(date-time)  |    |
|fastFileId | fdfs_id   |string  |    |
|groupName | 组名   |string  |    |
|id | 主键   |integer(int32)  |    |
|name | 名称   |string  |    |
|size | 大小   |string  |    |
|type | 状态   |integer(int32)  |    |
|url | URL地址   |string  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«PageInfo«SysDefFdfs»»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 上传文件

**接口描述**:上传文件

**接口地址**:`/web/fdfs/controller/fdfs/upload`


**请求方式**：`POST`


**consumes**:`["application/json"]`


**produces**:`["*/*"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|documentType| 文档类型  | query | true |integer  |    |
|file| 要上传的文件  | query | true |file  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"createId": 0,
		"createTime": "",
		"fastFileId": "",
		"groupName": "",
		"id": 0,
		"name": "",
		"size": "",
		"type": 0,
		"url": ""
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |SysDefFdfs  | SysDefFdfs   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**SysDefFdfs**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|createId | 创建人id   |integer(int32)  |    |
|createTime | 创建时间   |string(date-time)  |    |
|fastFileId | fdfs_id   |string  |    |
|groupName | 组名   |string  |    |
|id | 主键   |integer(int32)  |    |
|name | 名称   |string  |    |
|size | 大小   |string  |    |
|type | 状态   |integer(int32)  |    |
|url | URL地址   |string  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«SysDefFdfs»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
# web-文件上传接口

## 云存储配置信息

**接口描述**:云存储配置信息

**接口地址**:`/web/oss/controller/oss/config`


**请求方式**：`GET`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：
暂无



**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"aliyunAccessKeyId": "",
		"aliyunAccessKeySecret": "",
		"aliyunBucketName": "",
		"aliyunDomain": "",
		"aliyunEndPoint": "",
		"aliyunPrefix": "",
		"qcloudAppId": 0,
		"qcloudBucketName": "",
		"qcloudDomain": "",
		"qcloudPrefix": "",
		"qcloudRegion": "",
		"qcloudSecretId": "",
		"qcloudSecretKey": "",
		"qiniuAccessKey": "",
		"qiniuBucketName": "",
		"qiniuDomain": "",
		"qiniuPrefix": "",
		"qiniuSecretKey": "",
		"type": 0
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |CloudStorageConfig  | CloudStorageConfig   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**CloudStorageConfig**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|aliyunAccessKeyId |    |string  |    |
|aliyunAccessKeySecret |    |string  |    |
|aliyunBucketName |    |string  |    |
|aliyunDomain |    |string  |    |
|aliyunEndPoint |    |string  |    |
|aliyunPrefix |    |string  |    |
|qcloudAppId |    |integer(int32)  |    |
|qcloudBucketName |    |string  |    |
|qcloudDomain |    |string  |    |
|qcloudPrefix |    |string  |    |
|qcloudRegion |    |string  |    |
|qcloudSecretId |    |string  |    |
|qcloudSecretKey |    |string  |    |
|qiniuAccessKey |    |string  |    |
|qiniuBucketName |    |string  |    |
|qiniuDomain |    |string  |    |
|qiniuPrefix |    |string  |    |
|qiniuSecretKey |    |string  |    |
|type |    |integer(int32)  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«CloudStorageConfig»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 保存云存储配置信息

**接口描述**:保存云存储配置信息

**接口地址**:`/web/oss/controller/oss/delete`


**请求方式**：`DELETE`


**consumes**:``


**produces**:`["*/*"]`


**请求示例**：
```json
[
	0
]
```


**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|ids| ids  | body | true |array  | integer   |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |object  |    |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 分页查询-返回PageInfo

**接口描述**:分页查询-返回PageInfo

**接口地址**:`/web/oss/controller/oss/list`


**请求方式**：`GET`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|createTime| 创建时间  | query | false |string  |    |
|id| 文件上传主键  | query | false |integer  |    |
|url| URL地址  | query | false |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"endRow": 0,
		"hasNextPage": true,
		"hasPreviousPage": true,
		"isFirstPage": true,
		"isLastPage": true,
		"list": [
			{
				"createTime": "",
				"documentType": 0,
				"id": 0,
				"type": 0,
				"url": ""
			}
		],
		"navigateFirstPage": 0,
		"navigateLastPage": 0,
		"navigatePages": 0,
		"navigatepageNums": [],
		"nextPage": 0,
		"pageNum": 0,
		"pageSize": 0,
		"pages": 0,
		"prePage": 0,
		"size": 0,
		"startRow": 0,
		"total": 0
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |PageInfo«SysDefOss»  | PageInfo«SysDefOss»   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**PageInfo«SysDefOss»**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|endRow |    |integer(int32)  |    |
|hasNextPage |    |boolean  |    |
|hasPreviousPage |    |boolean  |    |
|isFirstPage |    |boolean  |    |
|isLastPage |    |boolean  |    |
|list |    |array  | SysDefOss   |
|navigateFirstPage |    |integer(int32)  |    |
|navigateLastPage |    |integer(int32)  |    |
|navigatePages |    |integer(int32)  |    |
|navigatepageNums |    |array  |    |
|nextPage |    |integer(int32)  |    |
|pageNum |    |integer(int32)  |    |
|pageSize |    |integer(int32)  |    |
|pages |    |integer(int32)  |    |
|prePage |    |integer(int32)  |    |
|size |    |integer(int32)  |    |
|startRow |    |integer(int32)  |    |
|total |    |integer(int64)  |    |

**SysDefOss**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|createTime | 创建时间   |string(date-time)  |    |
|documentType | 文档类型   |integer(int32)  |    |
|id | 主键   |integer(int32)  |    |
|type | 1.7牛.oss3.奇瑞qq云   |integer(int32)  |    |
|url | URL地址   |string  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«PageInfo«SysDefOss»»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 保存云存储配置信息

**接口描述**:保存云存储配置信息

**接口地址**:`/web/oss/controller/oss/saveConfig`


**请求方式**：`POST`


**consumes**:`["application/json"]`


**produces**:`["*/*"]`


**请求示例**：
```json
{
	"aliyunAccessKeyId": "",
	"aliyunAccessKeySecret": "",
	"aliyunBucketName": "",
	"aliyunDomain": "",
	"aliyunEndPoint": "",
	"aliyunPrefix": "",
	"qcloudAppId": 0,
	"qcloudBucketName": "",
	"qcloudDomain": "",
	"qcloudPrefix": "",
	"qcloudRegion": "",
	"qcloudSecretId": "",
	"qcloudSecretKey": "",
	"qiniuAccessKey": "",
	"qiniuBucketName": "",
	"qiniuDomain": "",
	"qiniuPrefix": "",
	"qiniuSecretKey": "",
	"type": 0
}
```


**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|config| config  | body | true |CloudStorageConfig  | CloudStorageConfig   |

**schema属性说明**



**CloudStorageConfig**

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|aliyunAccessKeyId|   | body | false |string  |    |
|aliyunAccessKeySecret|   | body | false |string  |    |
|aliyunBucketName|   | body | false |string  |    |
|aliyunDomain|   | body | false |string  |    |
|aliyunEndPoint|   | body | false |string  |    |
|aliyunPrefix|   | body | false |string  |    |
|qcloudAppId|   | body | false |integer(int32)  |    |
|qcloudBucketName|   | body | false |string  |    |
|qcloudDomain|   | body | false |string  |    |
|qcloudPrefix|   | body | false |string  |    |
|qcloudRegion|   | body | false |string  |    |
|qcloudSecretId|   | body | false |string  |    |
|qcloudSecretKey|   | body | false |string  |    |
|qiniuAccessKey|   | body | false |string  |    |
|qiniuBucketName|   | body | false |string  |    |
|qiniuDomain|   | body | false |string  |    |
|qiniuPrefix|   | body | false |string  |    |
|qiniuSecretKey|   | body | false |string  |    |
|type|   | body | false |integer(int32)  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |object  |    |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 上传文件

**接口描述**:上传文件

**接口地址**:`/web/oss/controller/oss/upload`


**请求方式**：`POST`


**consumes**:`["application/json"]`


**produces**:`["*/*"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|documentType| 文档类型  | query | true |integer  |    |
|file| 文件file  | query | true |file  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": "",
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |string  |    |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«string»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
# web-登陆/登出

## web登陆

**接口描述**:web登陆

**接口地址**:`/web/login`


**请求方式**：`POST`


**consumes**:`["application/json"]`


**produces**:`["application/json;charset=UTF-8"]`


**请求示例**：
```json
{
	"dataSecret": "m88Z27+lwYkHsOwPFZmrBV2QdaEo4GHlkZcb7kj3Qll2nHYuWQUpvXGKN5j9yYrvueM7yV31YJVn4P+/nlsfx4/b2wvDMwqIogo1FoJfO8M4FOvY1wTSf4ja3MrcoCui7At2YUZ9NdNgqvI59cQ3Xo2GXIHWj2d4+wx9aimJaN0bxYNSGC+P5wvS3xCT8wK5al8Vh7UIM0T5L/RW4nBIVuzX+yGsWdWuDBuQ/IrTiJr6DquVJPpWdAX+pgGxTN46Lbnd47y9X1BoWKXfLo8lO/MV3Ql8428rlkHk3l7I7DPdgIvdNoOfb8B/3oIZCAbmdgc43clJWSki53wn7k/q2w==",
	"sign": "f45093c34df858ef779c73a16b53a975"
}
```


**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|form| form  | body | true |SysLoginForm  | SysLoginForm   |

**schema属性说明**



**SysLoginForm**

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|dataSecret| 加密数据  | body | false |string  |    |
|sign| 数字签名  | body | false |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"adminId": 0,
		"expire": 0,
		"expireTime": "",
		"token": "",
		"updateTime": ""
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |SysAdminToken  | SysAdminToken   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**SysAdminToken**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|adminId |    |integer(int32)  |    |
|expire |    |integer(int32)  |    |
|expireTime |    |string(date-time)  |    |
|token |    |string  |    |
|updateTime |    |string(date-time)  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«SysAdminToken»|
| 400 | 参数有误  ||
| 402 | 验证码错误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 412 | 账号已被锁定,请联系管理员  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## web logout

**接口描述**:web logout

**接口地址**:`/web/logout`


**请求方式**：`POST`


**consumes**:`["application/json"]`


**produces**:`["*/*"]`



**请求参数**：
暂无



**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |object  |    |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
# web-系统日志接口

## 分页查询-返回PageInfo

**接口描述**:分页查询-返回PageInfo

**接口地址**:`/web/sys/controller/log/list`


**请求方式**：`GET`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|createTime| 创建时间  | query | false |string  |    |
|id| 系统日志主键  | query | false |integer  |    |
|ip| IP地址  | query | false |string  |    |
|method| 请求方法  | query | false |string  |    |
|operation| 用户操作  | query | false |string  |    |
|params| 请求参数  | query | false |string  |    |
|time| 执行时长(毫秒)  | query | false |integer  |    |
|userName| 用户名  | query | false |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"endRow": 0,
		"hasNextPage": true,
		"hasPreviousPage": true,
		"isFirstPage": true,
		"isLastPage": true,
		"list": [
			{
				"createTime": "",
				"id": 0,
				"ip": "",
				"method": "",
				"old": "",
				"operation": "",
				"params": "",
				"time": 0,
				"userName": ""
			}
		],
		"navigateFirstPage": 0,
		"navigateLastPage": 0,
		"navigatePages": 0,
		"navigatepageNums": [],
		"nextPage": 0,
		"pageNum": 0,
		"pageSize": 0,
		"pages": 0,
		"prePage": 0,
		"size": 0,
		"startRow": 0,
		"total": 0
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |PageInfo«SysDefLog»  | PageInfo«SysDefLog»   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**PageInfo«SysDefLog»**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|endRow |    |integer(int32)  |    |
|hasNextPage |    |boolean  |    |
|hasPreviousPage |    |boolean  |    |
|isFirstPage |    |boolean  |    |
|isLastPage |    |boolean  |    |
|list |    |array  | SysDefLog   |
|navigateFirstPage |    |integer(int32)  |    |
|navigateLastPage |    |integer(int32)  |    |
|navigatePages |    |integer(int32)  |    |
|navigatepageNums |    |array  |    |
|nextPage |    |integer(int32)  |    |
|pageNum |    |integer(int32)  |    |
|pageSize |    |integer(int32)  |    |
|pages |    |integer(int32)  |    |
|prePage |    |integer(int32)  |    |
|size |    |integer(int32)  |    |
|startRow |    |integer(int32)  |    |
|total |    |integer(int64)  |    |

**SysDefLog**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|createTime | 创建时间   |string(date-time)  |    |
|id | 主键   |integer(int32)  |    |
|ip | IP地址   |string  |    |
|method | 请求方法   |string  |    |
|old | 旧信息   |string  |    |
|operation | 用户操作   |string  |    |
|params | 请求参数   |string  |    |
|time | 执行时长(毫秒)   |integer(int64)  |    |
|userName | 用户名   |string  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«PageInfo«SysDefLog»»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
# web-系统用户接口

## 删除用户

**接口描述**:删除用户

**接口地址**:`/web/sys/controller/admin/delete`


**请求方式**：`POST`


**consumes**:`["application/json"]`


**produces**:`["*/*"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|ids| 主键id  | body | true |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |object  |    |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 获取登录的用户信息

**接口描述**:获取登录的用户信息

**接口地址**:`/web/sys/controller/admin/info`


**请求方式**：`GET`


**consumes**:``


**produces**:`["*/*"]`



**请求参数**：
暂无



**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"code": "",
		"createAdminId": 0,
		"createTime": "",
		"email": "",
		"id": 0,
		"mobile": "",
		"name": "",
		"password": "",
		"remake": "",
		"roleIdList": [],
		"sex": 0,
		"status": 0,
		"updateTime": ""
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |SysDefAdmin  | SysDefAdmin   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**SysDefAdmin**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|code | 随即串   |string  |    |
|createAdminId | 创建者ID   |integer(int32)  |    |
|createTime | 创建时间   |string(date-time)  |    |
|email | 邮箱   |string  |    |
|id | 主键   |integer(int32)  |    |
|mobile | 手机号   |string  |    |
|name | 用户名   |string  |    |
|password | 密码   |string  |    |
|remake | 备注   |string  |    |
|roleIdList | 角色ID列表   |array  |    |
|sex | 性别0女1男   |integer(int32)  |    |
|status | 状态  0：禁用   1：正常   |integer(int32)  |    |
|updateTime | 更新时间   |string(date-time)  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«SysDefAdmin»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 根据主键查询用户信息

**接口描述**:根据主键查询用户信息

**接口地址**:`/web/sys/controller/admin/infoByKey`


**请求方式**：`GET`


**consumes**:``


**produces**:`["*/*"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|id| 主键id  | query | true |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"code": "",
		"createAdminId": 0,
		"createTime": "",
		"email": "",
		"id": 0,
		"mobile": "",
		"name": "",
		"password": "",
		"remake": "",
		"roleIdList": [],
		"sex": 0,
		"status": 0,
		"updateTime": ""
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |SysDefAdmin  | SysDefAdmin   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**SysDefAdmin**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|code | 随即串   |string  |    |
|createAdminId | 创建者ID   |integer(int32)  |    |
|createTime | 创建时间   |string(date-time)  |    |
|email | 邮箱   |string  |    |
|id | 主键   |integer(int32)  |    |
|mobile | 手机号   |string  |    |
|name | 用户名   |string  |    |
|password | 密码   |string  |    |
|remake | 备注   |string  |    |
|roleIdList | 角色ID列表   |array  |    |
|sex | 性别0女1男   |integer(int32)  |    |
|status | 状态  0：禁用   1：正常   |integer(int32)  |    |
|updateTime | 更新时间   |string(date-time)  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«SysDefAdmin»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
| 1022 | id不能为空  ||
## 分页查询管理员列表-返回PageInfo

**接口描述**:返回数据和分页信息

**接口地址**:`/web/sys/controller/admin/list`


**请求方式**：`GET`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|createAdminId| 创建者ID  | query | false |integer  |    |
|createTime| 创建时间  | query | false |string  |    |
|email| 邮箱  | query | false |string  |    |
|id| 主键  | query | false |integer  |    |
|mobile| 手机号  | query | false |string  |    |
|name| 用户名  | query | false |string  |    |
|sex| 性别0女1男  | query | false |integer  |    |
|status| 状态  0：禁用   1：正常  | query | false |integer  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"endRow": 0,
		"hasNextPage": true,
		"hasPreviousPage": true,
		"isFirstPage": true,
		"isLastPage": true,
		"list": [
			{
				"code": "",
				"createAdminId": 0,
				"createTime": "",
				"email": "",
				"id": 0,
				"mobile": "",
				"name": "",
				"password": "",
				"remake": "",
				"roleIdList": [],
				"sex": 0,
				"status": 0,
				"updateTime": ""
			}
		],
		"navigateFirstPage": 0,
		"navigateLastPage": 0,
		"navigatePages": 0,
		"navigatepageNums": [],
		"nextPage": 0,
		"pageNum": 0,
		"pageSize": 0,
		"pages": 0,
		"prePage": 0,
		"size": 0,
		"startRow": 0,
		"total": 0
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |PageInfo«SysDefAdmin»  | PageInfo«SysDefAdmin»   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**PageInfo«SysDefAdmin»**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|endRow |    |integer(int32)  |    |
|hasNextPage |    |boolean  |    |
|hasPreviousPage |    |boolean  |    |
|isFirstPage |    |boolean  |    |
|isLastPage |    |boolean  |    |
|list |    |array  | SysDefAdmin   |
|navigateFirstPage |    |integer(int32)  |    |
|navigateLastPage |    |integer(int32)  |    |
|navigatePages |    |integer(int32)  |    |
|navigatepageNums |    |array  |    |
|nextPage |    |integer(int32)  |    |
|pageNum |    |integer(int32)  |    |
|pageSize |    |integer(int32)  |    |
|pages |    |integer(int32)  |    |
|prePage |    |integer(int32)  |    |
|size |    |integer(int32)  |    |
|startRow |    |integer(int32)  |    |
|total |    |integer(int64)  |    |

**SysDefAdmin**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|code | 随即串   |string  |    |
|createAdminId | 创建者ID   |integer(int32)  |    |
|createTime | 创建时间   |string(date-time)  |    |
|email | 邮箱   |string  |    |
|id | 主键   |integer(int32)  |    |
|mobile | 手机号   |string  |    |
|name | 用户名   |string  |    |
|password | 密码   |string  |    |
|remake | 备注   |string  |    |
|roleIdList | 角色ID列表   |array  |    |
|sex | 性别0女1男   |integer(int32)  |    |
|status | 状态  0：禁用   1：正常   |integer(int32)  |    |
|updateTime | 更新时间   |string(date-time)  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«PageInfo«SysDefAdmin»»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 修改登录用户密码

**接口描述**:修改登录用户密码

**接口地址**:`/web/sys/controller/admin/password`


**请求方式**：`POST`


**consumes**:`["application/json"]`


**produces**:`["*/*"]`


**请求示例**：
```json
{
	"newPassword": "123456",
	"password": "123456"
}
```


**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|form| form  | body | true |PasswordForm  | PasswordForm   |

**schema属性说明**



**PasswordForm**

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|newPassword| 新密码  | body | true |string  |    |
|password| 原密码  | body | true |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |object  |    |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 添加用户

**接口描述**:添加用户

**接口地址**:`/web/sys/controller/admin/save`


**请求方式**：`POST`


**consumes**:`["application/json"]`


**produces**:`["application/json;charset=UTF-8"]`


**请求示例**：
```json
{
	"email": "",
	"id": 0,
	"mobile": "",
	"name": "",
	"password": "",
	"remake": "",
	"roleIdList": [],
	"sex": 0,
	"status": 0
}
```


**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|sysDefAdmin| sysDefAdmin  | body | true |SaveAdminForm  | SaveAdminForm   |

**schema属性说明**



**SaveAdminForm**

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|email| 邮箱  | body | false |string  |    |
|id| 主键  | body | false |integer(int32)  |    |
|mobile| 手机号  | body | false |string  |    |
|name| 用户名  | body | false |string  |    |
|password| 密码  | body | false |string  |    |
|remake| 备注  | body | false |string  |    |
|roleIdList| 角色id  | body | false |array  |    |
|sex| 性别0女1男  | body | false |integer(int32)  |    |
|status| 状态  0：禁用   1：正常  | body | false |integer(int32)  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": 0,
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |integer(int32)  | integer(int32)   |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«int»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 修改用户

**接口描述**:修改用户

**接口地址**:`/web/sys/controller/admin/update`


**请求方式**：`POST`


**consumes**:`["application/json"]`


**produces**:`["application/json;charset=UTF-8"]`


**请求示例**：
```json
{
	"email": "",
	"id": 0,
	"mobile": "",
	"name": "",
	"password": "",
	"remake": "",
	"roleIdList": [],
	"sex": 0,
	"status": 0
}
```


**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|sysDefAdmin| sysDefAdmin  | body | true |SaveAdminForm  | SaveAdminForm   |

**schema属性说明**



**SaveAdminForm**

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|email| 邮箱  | body | false |string  |    |
|id| 主键  | body | false |integer(int32)  |    |
|mobile| 手机号  | body | false |string  |    |
|name| 用户名  | body | false |string  |    |
|password| 密码  | body | false |string  |    |
|remake| 备注  | body | false |string  |    |
|roleIdList| 角色id  | body | false |array  |    |
|sex| 性别0女1男  | body | false |integer(int32)  |    |
|status| 状态  0：禁用   1：正常  | body | false |integer(int32)  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": 0,
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |integer(int32)  | integer(int32)   |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«int»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
# web-系统配置信息表接口

## 删除

**接口描述**:删除

**接口地址**:`/web/sys/controller/config/delete`


**请求方式**：`DELETE`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|ids| 主键id  | body | true |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |object  |    |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
| 1022 | id不能为空  ||
## 根据主键查询配置信息

**接口描述**:根据主键查询配置信息

**接口地址**:`/web/sys/controller/config/info`


**请求方式**：`GET`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|id| 主键id  | query | true |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"id": 0,
		"paramKey": "",
		"paramValue": "",
		"remark": "",
		"status": 0
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |SysDefConfig  | SysDefConfig   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**SysDefConfig**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|id | 主键   |integer(int32)  |    |
|paramKey | key   |string  |    |
|paramValue | value   |string  |    |
|remark | 备注   |string  |    |
|status | 状态   0：隐藏   1：显示   |integer(int32)  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«SysDefConfig»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
| 1022 | id不能为空  ||
## 所有配置列表

**接口描述**:所有配置列表

**接口地址**:`/web/sys/controller/config/list`


**请求方式**：`GET`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|id| 系统配置信息主键  | query | false |integer  |    |
|paramKey| key  | query | false |string  |    |
|paramValue| value  | query | false |string  |    |
|remark| 备注  | query | false |string  |    |
|status| 状态   0：隐藏   1：显示  | query | false |integer  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"endRow": 0,
		"hasNextPage": true,
		"hasPreviousPage": true,
		"isFirstPage": true,
		"isLastPage": true,
		"list": [
			{
				"id": 0,
				"paramKey": "",
				"paramValue": "",
				"remark": "",
				"status": 0
			}
		],
		"navigateFirstPage": 0,
		"navigateLastPage": 0,
		"navigatePages": 0,
		"navigatepageNums": [],
		"nextPage": 0,
		"pageNum": 0,
		"pageSize": 0,
		"pages": 0,
		"prePage": 0,
		"size": 0,
		"startRow": 0,
		"total": 0
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |PageInfo«SysDefConfig»  | PageInfo«SysDefConfig»   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**PageInfo«SysDefConfig»**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|endRow |    |integer(int32)  |    |
|hasNextPage |    |boolean  |    |
|hasPreviousPage |    |boolean  |    |
|isFirstPage |    |boolean  |    |
|isLastPage |    |boolean  |    |
|list |    |array  | SysDefConfig   |
|navigateFirstPage |    |integer(int32)  |    |
|navigateLastPage |    |integer(int32)  |    |
|navigatePages |    |integer(int32)  |    |
|navigatepageNums |    |array  |    |
|nextPage |    |integer(int32)  |    |
|pageNum |    |integer(int32)  |    |
|pageSize |    |integer(int32)  |    |
|pages |    |integer(int32)  |    |
|prePage |    |integer(int32)  |    |
|size |    |integer(int32)  |    |
|startRow |    |integer(int32)  |    |
|total |    |integer(int64)  |    |

**SysDefConfig**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|id | 主键   |integer(int32)  |    |
|paramKey | key   |string  |    |
|paramValue | value   |string  |    |
|remark | 备注   |string  |    |
|status | 状态   0：隐藏   1：显示   |integer(int32)  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«PageInfo«SysDefConfig»»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 添加配置

**接口描述**:添加配置

**接口地址**:`/web/sys/controller/config/save`


**请求方式**：`POST`


**consumes**:`["application/json"]`


**produces**:`["application/json;charset=UTF-8"]`


**请求示例**：
```json
{
	"id": 0,
	"paramKey": "",
	"paramValue": "",
	"remark": "",
	"status": 0
}
```


**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|config| config  | body | true |ConfigForm  | ConfigForm   |

**schema属性说明**



**ConfigForm**

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|id| 系统配置信息主键  | body | false |integer(int32)  |    |
|paramKey| key  | body | false |string  |    |
|paramValue| value  | body | false |string  |    |
|remark| 备注  | body | false |string  |    |
|status| 状态   0：隐藏   1：显示  | body | false |integer(int32)  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": 0,
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |integer(int32)  | integer(int32)   |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«int»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 更新

**接口描述**:更新

**接口地址**:`/web/sys/controller/config/update`


**请求方式**：`POST`


**consumes**:`["application/json"]`


**produces**:`["application/json;charset=UTF-8"]`


**请求示例**：
```json
{
	"id": 0,
	"paramKey": "",
	"paramValue": "",
	"remark": "",
	"status": 0
}
```


**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|config| config  | body | true |ConfigForm  | ConfigForm   |

**schema属性说明**



**ConfigForm**

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|id| 系统配置信息主键  | body | false |integer(int32)  |    |
|paramKey| key  | body | false |string  |    |
|paramValue| value  | body | false |string  |    |
|remark| 备注  | body | false |string  |    |
|status| 状态   0：隐藏   1：显示  | body | false |integer(int32)  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |object  |    |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
# web-菜单管理接口

## 删除菜单

**接口描述**:删除菜单

**接口地址**:`/web/sys/controller/menu/delete`


**请求方式**：`DELETE`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|id| 主键id  | body | true |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |object  |    |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
| 1022 | id不能为空  ||
## 获取左边菜单和权限

**接口描述**:获取左边菜单和权限

**接口地址**:`/web/sys/controller/menu/getMenu`


**请求方式**：`GET`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：
暂无



**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"menuList": [
			{
				"icon": "",
				"id": 0,
				"list": [],
				"name": "",
				"open": true,
				"orders": 0,
				"parentId": 0,
				"parentName": "",
				"perms": "",
				"type": 0,
				"url": ""
			}
		],
		"permissions": []
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |MenuPermissions  | MenuPermissions   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**MenuPermissions**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|menuList | 获取左侧菜单   |array  | SysDefMenu   |
|permissions | 菜单名称   |array  |    |

**SysDefMenu**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|icon | 菜单图标   |string  |    |
|id | 主键   |integer(int32)  |    |
|list |    |array  |    |
|name | 菜单名称   |string  |    |
|open |    |boolean  |    |
|orders | 排序   |integer(int32)  |    |
|parentId | 父菜单ID，一级菜单为0   |integer(int32)  |    |
|parentName | 父菜单名称   |string  |    |
|perms | 授权(多个用逗号分隔，如：user:list,user:create)   |string  |    |
|type | 类型   0：目录   1：菜单   2：按钮   |integer(int32)  |    |
|url | 菜单URL   |string  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«MenuPermissions»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 菜单信息

**接口描述**:菜单信息

**接口地址**:`/web/sys/controller/menu/info`


**请求方式**：`GET`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|id| id  | query | false |integer  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"icon": "",
		"id": 0,
		"list": [],
		"name": "",
		"open": true,
		"orders": 0,
		"parentId": 0,
		"parentName": "",
		"perms": "",
		"type": 0,
		"url": ""
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |SysDefMenu  | SysDefMenu   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**SysDefMenu**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|icon | 菜单图标   |string  |    |
|id | 主键   |integer(int32)  |    |
|list |    |array  |    |
|name | 菜单名称   |string  |    |
|open |    |boolean  |    |
|orders | 排序   |integer(int32)  |    |
|parentId | 父菜单ID，一级菜单为0   |integer(int32)  |    |
|parentName | 父菜单名称   |string  |    |
|perms | 授权(多个用逗号分隔，如：user:list,user:create)   |string  |    |
|type | 类型   0：目录   1：菜单   2：按钮   |integer(int32)  |    |
|url | 菜单URL   |string  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«SysDefMenu»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 所有菜单列表

**接口描述**:所有菜单列表

**接口地址**:`/web/sys/controller/menu/list`


**请求方式**：`GET`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：
暂无



**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": [
		{
			"icon": "",
			"id": 0,
			"list": [],
			"name": "",
			"open": true,
			"orders": 0,
			"parentId": 0,
			"parentName": "",
			"perms": "",
			"type": 0,
			"url": ""
		}
	],
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |array  | SysDefMenu   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**SysDefMenu**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|icon | 菜单图标   |string  |    |
|id | 主键   |integer(int32)  |    |
|list |    |array  |    |
|name | 菜单名称   |string  |    |
|open |    |boolean  |    |
|orders | 排序   |integer(int32)  |    |
|parentId | 父菜单ID，一级菜单为0   |integer(int32)  |    |
|parentName | 父菜单名称   |string  |    |
|perms | 授权(多个用逗号分隔，如：user:list,user:create)   |string  |    |
|type | 类型   0：目录   1：菜单   2：按钮   |integer(int32)  |    |
|url | 菜单URL   |string  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«List«SysDefMenu»»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 保存菜单

**接口描述**:保存菜单

**接口地址**:`/web/sys/controller/menu/save`


**请求方式**：`POST`


**consumes**:`["application/json"]`


**produces**:`["application/json;charset=UTF-8"]`


**请求示例**：
```json
{
	"icon": "",
	"id": 0,
	"name": "",
	"orders": 0,
	"parentId": 0,
	"perms": "",
	"type": 0,
	"url": ""
}
```


**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|menu| menu  | body | true |MenuForm  | MenuForm   |

**schema属性说明**



**MenuForm**

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|icon| 菜单图标  | body | false |string  |    |
|id| 主键  | body | false |integer(int32)  |    |
|name| 菜单名称  | body | false |string  |    |
|orders| 排序  | body | false |integer(int32)  |    |
|parentId| 父菜单ID，一级菜单为0  | body | false |integer(int32)  |    |
|perms| 授权(多个用逗号分隔，如：user:list,user:create)  | body | false |string  |    |
|type| 类型   0：目录   1：菜单   2：按钮  | body | false |integer(int32)  |    |
|url| 菜单URL  | body | false |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |object  |    |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 选择菜单(添加、修改菜单)

**接口描述**:选择菜单(添加、修改菜单)

**接口地址**:`/web/sys/controller/menu/select`


**请求方式**：`GET`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：
暂无



**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": [
		{
			"icon": "",
			"id": 0,
			"list": [],
			"name": "",
			"open": true,
			"orders": 0,
			"parentId": 0,
			"parentName": "",
			"perms": "",
			"type": 0,
			"url": ""
		}
	],
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |array  | SysDefMenu   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**SysDefMenu**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|icon | 菜单图标   |string  |    |
|id | 主键   |integer(int32)  |    |
|list |    |array  |    |
|name | 菜单名称   |string  |    |
|open |    |boolean  |    |
|orders | 排序   |integer(int32)  |    |
|parentId | 父菜单ID，一级菜单为0   |integer(int32)  |    |
|parentName | 父菜单名称   |string  |    |
|perms | 授权(多个用逗号分隔，如：user:list,user:create)   |string  |    |
|type | 类型   0：目录   1：菜单   2：按钮   |integer(int32)  |    |
|url | 菜单URL   |string  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«List«SysDefMenu»»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 修改菜单

**接口描述**:修改菜单

**接口地址**:`/web/sys/controller/menu/update`


**请求方式**：`POST`


**consumes**:`["application/json"]`


**produces**:`["application/json;charset=UTF-8"]`


**请求示例**：
```json
{
	"icon": "",
	"id": 0,
	"name": "",
	"orders": 0,
	"parentId": 0,
	"perms": "",
	"type": 0,
	"url": ""
}
```


**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|menu| menu  | body | true |MenuForm  | MenuForm   |

**schema属性说明**



**MenuForm**

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|icon| 菜单图标  | body | false |string  |    |
|id| 主键  | body | false |integer(int32)  |    |
|name| 菜单名称  | body | false |string  |    |
|orders| 排序  | body | false |integer(int32)  |    |
|parentId| 父菜单ID，一级菜单为0  | body | false |integer(int32)  |    |
|perms| 授权(多个用逗号分隔，如：user:list,user:create)  | body | false |string  |    |
|type| 类型   0：目录   1：菜单   2：按钮  | body | false |integer(int32)  |    |
|url| 菜单URL  | body | false |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |object  |    |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
# web-角色接口

## 删除

**接口描述**:删除

**接口地址**:`/web/sys/controller/role/delete`


**请求方式**：`DELETE`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|roleIds| 主键id  | body | true |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |object  |    |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
| 1022 | id不能为空  ||
## 根据id查询角色信息

**接口描述**:根据id查询角色信息

**接口地址**:`/web/sys/controller/role/info`


**请求方式**：`GET`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|id| 主键id  | query | true |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"createAdminId": 0,
		"createTime": "",
		"id": 0,
		"menuIdList": [],
		"remark": "",
		"roleName": "",
		"updateAdminId": 0,
		"updateTime": ""
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |SysDefRole  | SysDefRole   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**SysDefRole**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|createAdminId | 创建者ID   |integer(int32)  |    |
|createTime | 创建时间   |string(date-time)  |    |
|id | 主键   |integer(int32)  |    |
|menuIdList | 菜单id列表   |array  |    |
|remark | 备注   |string  |    |
|roleName | 角色名称   |string  |    |
|updateAdminId | 更新人ID   |integer(int32)  |    |
|updateTime | 更新时间   |string(date-time)  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«SysDefRole»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
| 1022 | id不能为空  ||
## 分页查询角色列表-返回PageInfo

**接口描述**:分页查询角色列表-返回PageInfo

**接口地址**:`/web/sys/controller/role/list`


**请求方式**：`GET`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|createAdminId| 创建者ID  | query | false |integer  |    |
|id| 主键  | query | false |integer  |    |
|menuIdList| 菜单id-list  | query | false |array  | integer   |
|remark| 备注  | query | false |string  |    |
|roleName| 角色名称  | query | false |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"endRow": 0,
		"hasNextPage": true,
		"hasPreviousPage": true,
		"isFirstPage": true,
		"isLastPage": true,
		"list": [
			{
				"createAdminId": 0,
				"createTime": "",
				"id": 0,
				"menuIdList": [],
				"remark": "",
				"roleName": "",
				"updateAdminId": 0,
				"updateTime": ""
			}
		],
		"navigateFirstPage": 0,
		"navigateLastPage": 0,
		"navigatePages": 0,
		"navigatepageNums": [],
		"nextPage": 0,
		"pageNum": 0,
		"pageSize": 0,
		"pages": 0,
		"prePage": 0,
		"size": 0,
		"startRow": 0,
		"total": 0
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |PageInfo«SysDefRole»  | PageInfo«SysDefRole»   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**PageInfo«SysDefRole»**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|endRow |    |integer(int32)  |    |
|hasNextPage |    |boolean  |    |
|hasPreviousPage |    |boolean  |    |
|isFirstPage |    |boolean  |    |
|isLastPage |    |boolean  |    |
|list |    |array  | SysDefRole   |
|navigateFirstPage |    |integer(int32)  |    |
|navigateLastPage |    |integer(int32)  |    |
|navigatePages |    |integer(int32)  |    |
|navigatepageNums |    |array  |    |
|nextPage |    |integer(int32)  |    |
|pageNum |    |integer(int32)  |    |
|pageSize |    |integer(int32)  |    |
|pages |    |integer(int32)  |    |
|prePage |    |integer(int32)  |    |
|size |    |integer(int32)  |    |
|startRow |    |integer(int32)  |    |
|total |    |integer(int64)  |    |

**SysDefRole**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|createAdminId | 创建者ID   |integer(int32)  |    |
|createTime | 创建时间   |string(date-time)  |    |
|id | 主键   |integer(int32)  |    |
|menuIdList | 菜单id列表   |array  |    |
|remark | 备注   |string  |    |
|roleName | 角色名称   |string  |    |
|updateAdminId | 更新人ID   |integer(int32)  |    |
|updateTime | 更新时间   |string(date-time)  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«PageInfo«SysDefRole»»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 添加

**接口描述**:添加

**接口地址**:`/web/sys/controller/role/save`


**请求方式**：`POST`


**consumes**:`["application/json"]`


**produces**:`["application/json;charset=UTF-8"]`


**请求示例**：
```json
{
	"createAdminId": 0,
	"id": 0,
	"menuIdList": [],
	"remark": "",
	"roleName": ""
}
```


**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|role| role  | body | true |RoleForm  | RoleForm   |

**schema属性说明**



**RoleForm**

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|createAdminId| 创建者ID  | body | false |integer(int32)  |    |
|id| 主键  | body | false |integer(int32)  |    |
|menuIdList| 菜单id-list  | body | false |array  |    |
|remark| 备注  | body | false |string  |    |
|roleName| 角色名称  | body | false |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": 0,
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |integer(int32)  | integer(int32)   |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«int»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 不分页查询角色列表

**接口描述**:不分页查询角色列表

**接口地址**:`/web/sys/controller/role/select`


**请求方式**：`GET`


**consumes**:``


**produces**:`["application/json;charset=UTF-8"]`



**请求参数**：
暂无



**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {
		"endRow": 0,
		"hasNextPage": true,
		"hasPreviousPage": true,
		"isFirstPage": true,
		"isLastPage": true,
		"list": [
			{
				"createAdminId": 0,
				"createTime": "",
				"id": 0,
				"menuIdList": [],
				"remark": "",
				"roleName": "",
				"updateAdminId": 0,
				"updateTime": ""
			}
		],
		"navigateFirstPage": 0,
		"navigateLastPage": 0,
		"navigatePages": 0,
		"navigatepageNums": [],
		"nextPage": 0,
		"pageNum": 0,
		"pageSize": 0,
		"pages": 0,
		"prePage": 0,
		"size": 0,
		"startRow": 0,
		"total": 0
	},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |PageInfo«SysDefRole»  | PageInfo«SysDefRole»   |
|timestamp| 返回时间  |string  |    |



**schema属性说明**




**PageInfo«SysDefRole»**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|endRow |    |integer(int32)  |    |
|hasNextPage |    |boolean  |    |
|hasPreviousPage |    |boolean  |    |
|isFirstPage |    |boolean  |    |
|isLastPage |    |boolean  |    |
|list |    |array  | SysDefRole   |
|navigateFirstPage |    |integer(int32)  |    |
|navigateLastPage |    |integer(int32)  |    |
|navigatePages |    |integer(int32)  |    |
|navigatepageNums |    |array  |    |
|nextPage |    |integer(int32)  |    |
|pageNum |    |integer(int32)  |    |
|pageSize |    |integer(int32)  |    |
|pages |    |integer(int32)  |    |
|prePage |    |integer(int32)  |    |
|size |    |integer(int32)  |    |
|startRow |    |integer(int32)  |    |
|total |    |integer(int64)  |    |

**SysDefRole**

| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | ------------------|--------|----------- |
|createAdminId | 创建者ID   |integer(int32)  |    |
|createTime | 创建时间   |string(date-time)  |    |
|id | 主键   |integer(int32)  |    |
|menuIdList | 菜单id列表   |array  |    |
|remark | 备注   |string  |    |
|roleName | 角色名称   |string  |    |
|updateAdminId | 更新人ID   |integer(int32)  |    |
|updateTime | 更新时间   |string(date-time)  |    |

**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse«PageInfo«SysDefRole»»|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
## 更新

**接口描述**:更新

**接口地址**:`/web/sys/controller/role/update`


**请求方式**：`POST`


**consumes**:`["application/json"]`


**produces**:`["application/json;charset=UTF-8"]`


**请求示例**：
```json
{
	"createAdminId": 0,
	"id": 0,
	"menuIdList": [],
	"remark": "",
	"roleName": ""
}
```


**请求参数**：

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|role| role  | body | true |RoleForm  | RoleForm   |

**schema属性说明**



**RoleForm**

| 参数名称         | 参数说明     |     in |  是否必须      |  数据类型  |  schema  |
| ------------ | -------------------------------- |-----------|--------|----|--- |
|createAdminId| 创建者ID  | body | false |integer(int32)  |    |
|id| 主键  | body | false |integer(int32)  |    |
|menuIdList| 菜单id-list  | body | false |array  |    |
|remark| 备注  | body | false |string  |    |
|roleName| 角色名称  | body | false |string  |    |

**响应示例**:

```json
{
	"code": 0,
	"msg": "",
	"result": {},
	"timestamp": ""
}
```

**响应参数**:


| 参数名称         | 参数说明                             |    类型 |  schema |
| ------------ | -------------------|-------|----------- |
|code| 返回代码  |integer(int32)  | integer(int32)   |
|msg| 返回信息  |string  |    |
|result| 返回数据  |object  |    |
|timestamp| 返回时间  |string  |    |





**响应状态**:


| 状态码         | 说明                            |    schema                         |
| ------------ | -------------------------------- |---------------------- |
| 200 | OK  |ApiResponse|
| 400 | 参数有误  ||
| 404 | 路径不存在  ||
| 405 | 记录重复  ||
| 500 | 服务器内部错误  ||
| 501 | Hystrix异常  ||
| 502 | zuul异常  ||
