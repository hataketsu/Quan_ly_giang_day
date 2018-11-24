<ul class="sidebar-menu" data-widget="tree">
    <li class="header">{{$menu['header']}}</li>
    @foreach($menu['items']  as $item)
        @if(isset($item['items']))
            @include('web_widgets.side_bar.tree_link',["item"=>$item])
        @else
            @include('web_widgets.side_bar.link',["item"=>$item])
        @endif
    @endforeach
</ul>