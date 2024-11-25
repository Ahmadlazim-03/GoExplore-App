@extends('admin/index')
@section('content')
    <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Menu Tabel</h4>
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th> ID </th>
                                <th> Tipe Menu </th>
                                <th> Menu Name </th>
                                <th> Icon Menu </th>
                                <th> Href </th>
                                <th> ID Parent </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ( $DataMenu->Where('id_parent', null) as $value)
                                <tr>
                                    <td> {{ $value->id }} </td>
                                    <td> {{ $value->tipe_menu }} </td>
                                    <td> {{ $value->name }} </td>
                                    <td> {{ $value->icon_menu }} </td>
                                    <td> {{ $value->href }} </td>
                                    <td> {{ $value->id_parent }} </td>
                                    <td> <a href="/manajemen-menu-delete/{{ $value->id }}">Delete</a> </td>  
                                </tr>
                                @endforeach

                                @foreach ( $DataMenu->Where('id_parent', !null) as $value)
                                <tr>
                                    <td> {{ $value->id }} </td>
                                    <td> {{ $value->tipe_menu }} </td>
                                    <td> {{ $value->name }} </td>
                                    <td> {{ $value->icon_menu }} </td>
                                    <td> {{ $value->href }} </td>
                                    <td> {{ $value->id_parent }} </td>
                                    <td> <a href="/manajemen-menu-delete/{{ $value->id }}">Delete</a> </td>  
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Menu</h4>
                    <p class="card-description">Form tambah menu</p>
                    <form action="/manajemen-menu-create" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="form-group row">
                            <label for="exampleSelectTipeMenu" class="col-sm-3 col-form-label">Tipe Menu</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="tipe_menu" id="exampleSelectTipeMenu" required>
                                    <option value=""></option>
                                    <option value="dropdown">Dropdown</option>
                                    <option value="single">Single</option>
                                </select>
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label for="exampleInputName" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Name" required>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="exampleSelectIcon" class="col-sm-3 col-form-label">Icon Name</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="icon_menu" id="exampleSelectIcon" required>
                                    <option value="mdi-speedometer">mdi-speedometer</option>
                                    <option value="mdi-laptop">mdi-laptop</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="exampleInputHref" class="col-sm-3 col-form-label">Href</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputHref" name="href" placeholder="Href" required>
                            </div>
                        </div>
                
                        <div class="form-group row" id="parent-menu-group">
                            <label for="exampleSelectParent" class="col-sm-3 col-form-label">Parent Menu</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="id_parent" id="exampleSelectParent" >
                                        <option value="0"></option>
                                    @foreach ($DataMenu->Where('id_parent', null || 'id_parent', 0 )->Where('tipe_menu', 'dropdown') as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" required> Remember me
                            </label>
                        </div>
                    
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button type="button" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Menu</h4>
                    <p class="card-description">Form edit menu</p>
                    <form action="/manajemen-menu-edit" method="POST" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                            <label for="editInputId" class="col-sm-3 col-form-label">Select ID</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="editInputId" name="ID" placeholder="Select ID Menu" required>
                            </div>
                        </div>
         
                        <div class="form-group row">
                            <label for="editSelectTipeMenu" class="col-sm-3 col-form-label">Tipe Menu</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="tipe_menu" id="editSelectTipeMenu" required>
                                    <option value=""></option>
                                    <option value="dropdown">Dropdown</option>
                                    <option value="single">Single</option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="editInputName" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="editInputName" name="name" placeholder="Name" required>
                            </div>
                        </div>
                 
                        <div class="form-group row">
                            <label for="editSelectIcon" class="col-sm-3 col-form-label">Icon Name</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="icon_menu" id="editSelectIcon" required>
                                    <option value="mdi-speedometer">mdi-speedometer</option>
                                    <option value="mdi-laptop">mdi-laptop</option>
                                </select>
                            </div>
                        </div>
                   
                        <div class="form-group row">
                            <label for="editInputHref" class="col-sm-3 col-form-label">Href</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="editInputHref" name="href" placeholder="Href" required>
                            </div>
                        </div>
                     
                        <div class="form-group row" id="edit-parent-menu-group">
                            <label for="editSelectParent" class="col-sm-3 col-form-label">Parent Menu</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="id_parent" id="editSelectParent">
                                    <option value="0"></option>
                                    @foreach ($DataMenu->Where('id_parent', null || 'id_parent', 0 )->Where('tipe_menu', 'dropdown') as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" required> Remember me
                            </label>
                        </div>
                      
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button type="button" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const editTipeMenu = document.querySelector('#editSelectTipeMenu');
        const editParentMenuGroup = document.getElementById('edit-parent-menu-group');

        editTipeMenu.addEventListener('change', function () {
            if (this.value === 'dropdown') {
                editParentMenuGroup.style.display = 'none';
                editParentMenuGroup.querySelector('select').removeAttribute('required');
            } else {
                editParentMenuGroup.style.display = 'flex'; 
                editParentMenuGroup.querySelector('select').setAttribute('required', 'required');
            }
        });

        if (editTipeMenu.value === 'dropdown') {
            editParentMenuGroup.style.display = 'none';
            editParentMenuGroup.querySelector('select').removeAttribute('required');
        }
    });
</script>

    </div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tipeMenu = document.querySelector('select[name="tipe_menu"]');
        const parentMenuGroup = document.getElementById('parent-menu-group');

        tipeMenu.addEventListener('change', function () {
            if (this.value === 'dropdown') {
                parentMenuGroup.style.display = 'none';
                parentMenuGroup.querySelector('select').removeAttribute('required');
            } else {
                parentMenuGroup.style.display = 'flex'; 
                parentMenuGroup.querySelector('select').setAttribute('required', 'required');
            }
        });

        if (tipeMenu.value === 'dropdown') {
            parentMenuGroup.style.display = 'none';
            parentMenuGroup.querySelector('select').removeAttribute('required');
        }
    });
</script>
@endsection