@extends('layouts.admin')
@section('headCss')
<link rel="stylesheet" href="{{asset('public/css/fileinput.min.css')}}">
@stop
@section('dataBody')
<div class="row" id="vue">
    <ol class="breadcrumb">
        <li><a href="#">简历管理</a></li>
        <li class="active">基本信息</li>
    </ol>
    <form class="form-horizontal" role="form">
        <div class="col-md-9">
            @{{ data.a }}
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">名字</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="name" placeholder="请输入名字" v-bind:value="data.name">
                </div>
            </div>
            <div class="form-group">
                <label for="professional" class="col-sm-2 control-label">职业</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="professional" placeholder="请输入职业" :value="data.professional">
                </div>
            </div>
            <div class="form-group">
                <label for="introduction" class="col-sm-2 control-label">简介</label>
                <div class="col-sm-10">
                <textarea name="introduction" class="form-control" rows="3">@{{ data.introduction }}
                </textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-2 control-label">地址</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="address" placeholder="请输入你的地址" :value="data.address">
                </div>
            </div>
            <div class="form-group">
                <label for="Email" class="col-sm-2 control-label">邮箱</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="Email" placeholder="请输入你的邮箱地址" :value="data.Email">
                </div>
            </div>
            <div class="form-group">
                <label for="Email" class="col-sm-2 control-label">电话号码</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="Tel" v-model="data.Tel" placeholder="请输入你的电话号码" v-bind:value="data.Tel">
                </div>
            </div>
            <div class="form-group">
                <label for="url" class="col-sm-2 control-label">个人主页</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="url" placeholder="个人主页/博客首页/Github首页..." :value="data.url">
                </div>                
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <button class="btn btn-primary"  type="button" v-on:click="postMsg">提交</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <input id="avatar" type="file" name="avatar" multiple=true>
        </div>
    </form>
</div>
@stop
@section('footJsFiles')
<script src="{{asset('public/js/fileinput.min.js')}}"></script>
<script src="{{asset('public/js/vue.min.js')}}"></script>
<script src="{{asset('public/js/vue-resource.min.js')}}"></script>
@stop
@section('footJs')
    <script>
        $("#avatar").fileinput({
            showUpload: false,
            showCaption: false,
            showRemove: false,
            // uploadUrl: '#',
            browseIcon: '',
            browseClass: "btn btn-primary btn-sm col-md-offset-3",
            // language : 'zh',
            // showBrowse: false,
            initialPreview: [
            "<img src='http://caoyangjie.xyz/public/resume/images/avatar.jpg'"+"class='file-preview-image' alt='Chrysanthemum' title='Chrysanthemum.jpg' width='200px' height='150px'>",

            ],
            layoutTemplates: {
                preview:
                        '    <div class="{dropClass}">\n' +
                        '    {close}' +
                        '    <div class="file-preview-thumbnails">\n' +
                        '    </div>\n' +
                        '    <div class="clearfix"></div>' +
                        '    <div class="file-preview-status text-center text-success"></div>\n' +
                        '    <div class="kv-fileinput-error"></div>\n' +
                        '    </div>',
                // close: '<div class="close fileinput-remove">&times;</div>\n',
                // footer: '<div class="file-thumbnail-footer">\n' +
                //         '<div class="file-footer-buttons">\n' +
                //         '<button type="button" class="kv-file-remove {removeClass}" ' +
                //         'title="{removeTitle}" {dataUrl}{dataKey}><span class="glyphicon glyphicon-trash"></span></button>\n'+
                //         '</div>\n'+
                //         '</div>',
                footer: '<div class="file-thumbnail-footer">\n' +
                        '<div class="file-footer-buttons">\n' +
                        '<button type="button" class="kv-file-remove btn btn-xs btn-default" ' +
                        'title="移除文件" {dataUrl}{dataKey}><i class="glyphicon glyphicon-trash text-danger"></i></button>\n' +
                        '</div>\n'+
                        '</div>',                      
            },
            // initialPreviewShowDelete: false,
            // browseOnZoneClick: false,
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-file'></i>",
            previewSettings: {
                image: {width: "200px", height: "150px"},
                html: {width: "100px", height: "100px"},
            }
        });
        var vue = new Vue({
            el: "#vue",
            data: {
                data: {},
                apiUrl: '{{ url('admin/myMsg') }}',
                postUrl: '{{ url('myMsg') }}',
            },
            methods: {
                showResume: function () {
                    this.$http.get(this.apiUrl).then((response)=>{
                        this.data = response.data;
                    });
                },
                postMsg: function (e) {
                    e.preventDefault();
                    var data = new FormData();
                    data.append('Tel', this.data.Tel);
                    alert(this.data.Tel);
                    return false;
                    this.$http.post(this.postUrl,this.data).then((response)=>{
                        console.log(response);
                        this.data = response.data;
                    });
                    return false;
                }
            }
        });
        Vue.http.options.emulateJSON = true;
        vue.showResume();
    </script>
@stop
