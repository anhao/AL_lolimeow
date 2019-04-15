$('#image').change(function () {
    for (var i = 0; i < this.files.length; i++) {
        var f = this.files[i];
        if (!/image\/\w+/.test(f.type)) {
            layer.alert('请选择图片文件(png | jpg | gif)',{icon:2});
            return
        }
        var formData = new FormData();
        formData.append('smfile', f);
        $('#uploadinfo').html('<p class=\"card-text \">上传中...请稍等<img src=\"https://i.loli.net/2018/09/14/5b9bd17b2b43c.gif\" alt="图片上传中"></p>').fadeIn();
        $.ajax({
            url: 'https://sm.ms/api/upload',
            type: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            beforeSend: function (xhr) {
            },
            success: function (res) {
                del = res.data.dalete;
                $('#uploadinfo').remove();
                $("#showurl").css("display");
                $('#img2').append('<img class = "card-img-bottom" src="' + res.data.url + '" alt="<?php $this->options->title(); ?>专用图床" style="max-width: 300px;"/>');
                $('#urls').append('<label class="control-label badge badge-pill badge-success">上传成功，点击可直接复制内容</label><div class="form-group">	<input type="text"  value="' + res.data.url + '" class="form-control  is-valid" /> </div>');
                $('#html').append('<div class="form-group"><input type="text"  value="&lt;img src=&quot;'+res.data.url+'&quot; alt=&quot;'+res.data.filename+'&quot; title=&quot;'+res.data.filename+'&quot; /&gt;" class="form-control  is-valid" /> </div>');
                $('#bbcode').append('<div class="form-group"><input type="text" value="[img]'+res.data.url+'[/img]\n" class="form-control  is-valid"/></div>');
                $('#markdown').append('<div class="form-group"><input type="text" value="!['+res.data.filename+']('+res.data.url+')" class="form-control  is-valid"/></div>');
                $('#markdownlink').append('<div class="form-group"><input type="text" value="[!['+res.data.filename+']('+res.data.url+')]('+res.data.url+')" class="form-control  is-valid"/></div>');
                $('#msg').append('<span class = "badge badge-pill badge-success">' + res.data.msg + '</span>');
                $('#delete').append('<a href="javascript:void(0)" class="btn-sm btn btn-1 btn-danger mb20" id="del" target="_black">删除图床上该图片<div class="ripple-container"></div></a>');
                $('#del').click(function () {
                    $.get(res.data.delete,function (res) {
                        layer.alert(res);
                       setTimeout(function () {
                           window.location.reload();
                       },1000)
                    })
                })
                $('input').click(function () {
                    var content = $(this).val();
                    var clipboard =  new ClipboardJS('input', {
                        text: function() {
                            return content;
                        }
                    });
                    clipboard.on('success',function () {
                        layer.msg('复制链接成功');
                    });
                    clipboard.on('error',function () {
                        layer.msg('复制失败');
                    })
                })
            },
            error:function () {
               layer.alert('上传失败',{icon:2});
            }
        })
    }
});

