          <div class="right" id="c_right">
          <div class="s_about">
          <h2>关于博主</h2>
           <img src="{{asset('public/images/my.jpg')}}" width="230" height="230" alt="博主"/>
           <p>博主：漂流的木头</p>
           <p>职业：PHP工程师、Web工程师</p>
           <p>简介：热爱Web开发，熟悉laravel框架，Vue.js</p>
          </div>
          <!--栏目分类-->
           <div class="lanmubox">
              <div class="hd">
               <ul><li>精心推荐</li><li>最新文章</li><li class="hd_3">随机文章</li></ul>
              </div>
              <div class="bd">
                <ul>
                @foreach($techs as $tech)
                  <li><a href="{{url('view')}}/{{ $tech->id }}" title="{{ $tech->subject }}">{{ $tech->subject }}</a></li>
                @endforeach
                </ul>
                <ul>
                @foreach($news as $new)
                  <li><a href="{{url('view')}}/{{ $new->id }}" title="{{ $new->subject }}">{{ $new->subject }}</a></li>
                @endforeach
                </ul>
                <ul>
                @foreach($rands as $rand)
                  <li><a href="{{url('view')}}/{{ $rand->id }}" title="{{ $rand->subject }}">{{ $rand->subject }}</a></li>
                @endforeach
                </ul>
              </div>
           </div>
           <!--end-->
         </div>