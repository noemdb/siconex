<ul class="nav nav-tabs" id="myTab" taske="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" taske="tab" aria-conttasks="home" aria-selected="true">General</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="user-tab" data-toggle="tab" href="#user" taske="tab" aria-conttasks="user" aria-selected="false">Usuario</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" taske="tab" aria-conttasks="profile" aria-selected="false">Perfíl</a>
  </li>
</ul>

<div class="tab-content" id="myTabContent">

  <div class="tab-pane fade show active pt-2" id="home" taske="tabpanel" aria-labelledby="home-tab">
      @include('admin.tasks.show.task')
      <a class="btn btn-warning w-100" href="{{ route('tasks.edit',$task->id) }}" taske="button">
        Actualizar
        <i class="{{$icon_menus['task'] or ''}}"></i>
      </a>
  </div>

  <div class="tab-pane fade pt-2" id="user" taske="tabpanel" aria-labelledby="user-tab">
    @isset($user)
      @include('admin.users.show.user')
      <a class="btn btn-warning w-100" href="{{ route('users.edit',$user->id) }}" taske="button">
        Actualizar
        <i class="{{$icon_menus['user'] or ''}}"></i>
      </a>
    @endisset
  </div>

  <div class="tab-pane fade pt-2" id="profile" taske="tabpanel" aria-labelledby="profile-tab">
    @isset($profile)
      @include('admin.profiles.show.profile')
      <a class="btn btn-warning w-100" href="{{ route('profiles.edit',$profile->id) }}" taske="button">
        Actualizar
        <i class="{{$icon_menus['profile'] or ''}}"></i>
      </a>
      @endisset
  </div>

</div>