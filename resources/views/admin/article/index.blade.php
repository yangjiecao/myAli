@extends('layouts.admin')
@section('headCss')
@stop
@section('dataBody')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">博文管理</a></li>
        <li class="active">博文列表</li>
    </ol>
    <div id="test" class="form-group">
        <div class="form-group">
            <div class="page-header">
                数据
            </div>
            <table class="table table-bordered table-responsive table-striped">
                <tr>
                    <th>标题</th>
                    <th>内容</th>
                    <th>操作</th>
                </tr>
                <tr v-for="(item, index) in arrayData">
                    <td class="text-center">@{{item.subject}}</td>
                    <td>@{{item.content}}</td>
                    <td><a href="javascript:void(0)" v-on:click="deleteItem(index,item.subject)">del</a></td>
                </tr>
            </table>
            <div class="page-header">分页</div>
            <div class="pager" id="pager" v-if="pageCount > 1">
                <template v-for="item in pageCount+1">
                    <span v-if="item==1" class="btn btn-default" v-on:click="showPage(1,$event)">
                        首页
                    </span>
                    <span v-if="item==1" class="btn btn-default" v-on:click="showPage(pageCurrent-1,$event)">
                        上一页
                    </span>
                    <span v-if="item==1" class="btn btn-default" v-on:click="showPage(item,$event)">
                        @{{item}}
                    </span>
                    <span v-if="item==1&&item<showPagesStart-1" class="btn btn-default disabled">
                        ...
                    </span>
                    <span v-if="item>1&&item<=pageCount-1&&item>=showPagesStart&&item<=showPageEnd&&item<=pageCount" class="btn btn-default" v-on:click="showPage(item,$event)">
                        @{{item}}
                    </span>
                    <span v-if="item==pageCount&&item>showPageEnd+1" class="btn btn-default disabled">
                        ...
                    </span>
                    <span v-if="item==pageCount" class="btn btn-default" v-on:click="showPage(item,$event)">
                        @{{item}}
                    </span>
                    <span v-if="item==pageCount" class="btn btn-default" v-on:click="showPage(pageCurrent+1,$event)">
                        下一页
                    </span>
                    <span v-if="item==pageCount" class="btn btn-default" v-on:click="showPage(pageCount,$event)">
                        尾页
                    </span>
                </template>
                <span class="form-inline">
                <input type="text" v-model="pageCurrent" class="pageIndex form-control" style="width:60px;text-align:center" v-on:keyup.enter="showPage(pageCurrent,$event,true)">
                </span>
                <span>@{{pageCurrent}}/@{{pageCount}}</span>
            </div>
        </div>
    </div>
</div>
@stop
@section('footJsFiles')
<script src="{{asset('public/js/vue.min.js')}}"></script>
<script src="{{asset('public/js/vue-resource.min.js')}}"></script>
@stop
@section('footJs')
    <script>
        //只能输入正整数过滤器
        // Vue.filter('onlyNumeric', {
        //     // model -> view
        //     // 在更新 `<input>` 元素之前格式化值
        //     read: function (val) {
        //         return val;
        //     },
        //     // view -> model
        //     // 在写回数据之前格式化值
        //     write: function (val, oldVal) {
        //         var number = +val.replace(/[^\d]/g, '')
        //         return isNaN(number) ? 1 : parseFloat(number.toFixed(2))
        //     }
        // })

        //数组删除某项功能
        Array.prototype.remove = function (dx) {
            if (isNaN(dx) || dx > this.length) { return false; }
            for (var i = 0, n = 0; i < this.length; i++) {
                if (this[i] != this[dx]) {
                    this[n++] = this[i]
                }
            }
            this.length -= 1
        }

        var vue = new Vue({
            el: "#test",
            data: {
                //总项目数
                totalCount: '',
                //分页数
                pageCount: '',
                //当前页面
                pageCurrent: 1,
                //分页大小
                pagesize: '',
                //显示分页按钮数
                showPages: 5,
                //开始显示的分页按钮
                showPagesStart: 1,
                //结束显示的分页按钮
                showPageEnd: 1,
                //分页数据
                arrayData: [],

                apiUrl: '{{ url('api/article/lists') }}',
            },
            methods: {
                //分页方法
                showPage: function (pageIndex, $event, forceRefresh) {
                this.$http.get(this.apiUrl+'/'+pageIndex).then((response)=>{
                    this.arrayData = response.data.data;
                    this.totalCount = response.data.total;
                    this.pageCount = response.data.last_page;
                    this.pageCurrent = response.data.current_page;
                    console.log(this.arrayData);
                    if(response.data.last_page > 1){
                        this.pagesize = response.data.per_page;
                    }else{
                        this.pagesize = response.data.total;
                    }
                    this.showPageEnd = response.data.last_page;
                	var ex = /^\d+$/;
                	if (pageIndex < 0 || !ex.test(pageIndex)) {
                		return false;
                	}
                    if (pageIndex > 0) {
                        // if (pageIndex > this.pageCount) {
                        //     pageIndex = this.pageCount;
                        // }
                        console.log("totalCount"+this.pageCurrent);
                        //判断数据是否需要更新
                        // var currentPageCount = Math.ceil(this.totalCount / this.pagesize);
                        // if (currentPageCount != this.pageCount) {
                        //     pageIndex = 1;
                        //     this.pageCount = currentPageCount;
                        // }
                        // else if (this.pageCurrent == pageIndex && currentPageCount == this.pageCount && typeof (forceRefresh) == "undefined") {
                        //     console.log("not refresh");
                        //     return;
                        // }

                        //处理分页点中样式
                        var buttons = $("#pager").find("span");
                        for (var i = 0; i < buttons.length; i++) {
                            if (buttons.eq(i).html() != pageIndex) {
                                buttons.eq(i).removeClass("active");
                            }
                            else {
                                buttons.eq(i).addClass("active");
                            }
                        }

                        //测试数据 随机生成的
                        // var newPageInfo = [];
                        // for (var i = 0; i < this.pagesize; i++) {
                        //     newPageInfo[newPageInfo.length] = {
                        //         name: "test" + (i + (pageIndex - 1) * 20),
                        //         age: (i + (pageIndex - 1) * 20)
                        //     };
                        // }
                        // this.pageCurrent = pageIndex;
                        // this.arrayData = newPageInfo;

                        //计算分页按钮数据
                        if (this.pageCount > this.showPages) {
                            if (pageIndex <= (this.showPages - 1) / 2) {
                                this.showPagesStart = 1;
                                this.showPageEnd = this.showPages - 1;
                                console.log("showPage1")
                            }
                            else if (pageIndex >= this.pageCount - (this.showPages - 3) / 2) {
                                this.showPagesStart = this.pageCount - this.showPages + 2;
                                this.showPageEnd = this.pageCount;
                                console.log("showPage2")
                            }
                            else {
                                console.log("showPage3")
                                this.showPagesStart = pageIndex - (this.showPages - 3) / 2;
                                this.showPageEnd = pageIndex + (this.showPages - 3) / 2;
                            }
                        }
                        console.log("showPagesStart:" + this.showPagesStart + ",showPageEnd:" + this.showPageEnd + ",pageIndex:" + pageIndex);
                    }
                });

                }
                , deleteItem: function (index, age) {
                    if (confirm('确定要删除吗')) {
                        //console.log(index, age);

                        var newArray = [];
                        for (var i = 0; i < this.arrayData.length; i++) {
                            if (i != index) {
                                newArray[newArray.length] = this.arrayData[i];
                            }
                        }
                        this.arrayData = newArray;
                    }
                }
            }
        });
        vue.$watch("arrayData", function (value) {
            //console.log("==============arrayData begin==============");
            //console.log(value==vue.arrayData);
            //console.log(vue.arrayData);
            //console.log("==============arrayData end==============");
        });
        vue.showPage(vue.pageCurrent, null, true);
    </script>
@stop
