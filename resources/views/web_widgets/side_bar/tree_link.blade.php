<li class="treeview">
    <a><i class="fa {{$item['icon']}}"></i> <span>{{$item['title']}}</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
    </a>
    <ul class="treeview-menu">
        @foreach($item['items'] as $i)
            @include('web_widgets.side_bar.link',["item"=>$i])
        @endforeach

    </ul>
</li>