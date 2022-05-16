@extends('frontEnd.admin-dashboard')
@section('title') Edit Share@endsection
@section('mainContent')


    <style>
        .is-invalid{
            border-top: 2px solid red;
            border-bottom: 2px solid red;
        }
        .is-invalid-input{
            color: red;
        }
        .is-invalid-input::before, .is-invalid-input:after{
            background:red;
        }
    </style>
    <div class="bo-container">
        <div class="profile-init-div">
            <h1 class="profile-heading">Edit Share </h1>
        </div>
        <div class="user-profile-details" style="margin-top: 1rem">
            <form action="{{URL::to('/admin/share-update')}}" method="post">
                @csrf
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div id="container">

                    <span class="input">
                        <input type="hidden" class="input__field " id="id" value="{{$share->id}}"  name="id" />
                        <input type="text" class="input__field " id="name" value="{{$share->name}}"  name="name" placeholder="Enter Share Name" />
                        <label for="name" class="input__label  @error('name') is-invalid-input @enderror" data-toggle="tooltip" data-placement="bottom" ></label>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                   </span>

                    <span class="input">
                        <input type="number" class="input__field " id="qty" value="{{$share->qty}}"  name="qty" placeholder="Enter Share Qty" />
                        <label for="qty" class="input__label  @error('qty') is-invalid-input @enderror" data-toggle="tooltip" data-placement="bottom" ></label>
                        @if ($errors->has('qty'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('qty') }}</strong>
                            </span>
                        @endif
                   </span>


                    <span class="input">
                        <input type="number" class="input__field" value="{{$share->price}}" id="price" name="price" placeholder="Enter Share Price" />
                        <label for="price" class="input__label  @error('price') is-invalid-input @enderror" data-toggle="tooltip" data-placement="bottom" ></label>
                        @if ($errors->has('price'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                   </span>

                    <span class="input">
                        <input type="text" class="input__field " id="bo_isn" value="{{$share->bo_isn}}"  name="bo_isn" placeholder="Enter Share BO ISN" />
                        <label for="bo_isn" class="input__label  @error('bo_isn') is-invalid-input @enderror" data-toggle="tooltip" data-placement="bottom" ></label>
                        @if ($errors->has('bo_isn'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('bo_isn') }}</strong>
                            </span>
                        @endif
                   </span>

                    <span class="input">
                        <input type="text" class="input__field " id="group" value="{{$share->group}}"  name="group" placeholder="Enter Share Group" />
                        <label for="group" class="input__label  @error('group') is-invalid-input @enderror" data-toggle="tooltip" data-placement="bottom" ></label>
                        @if ($errors->has('group'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('group') }}</strong>
                            </span>
                        @endif
                   </span>

                    <span class="input radio-input @error('marginable') is-invalid @enderror">
                        <select class="select-option " id="marginable"  name="marginable">
                            <option value="" selected disabled>Select Marginable</option>
                            <option value="1" >Marginable</option>
                            <option value="0" >Non-Marginable</option>
                        </select>
                        <script>
                        document.getElementById('marginable').value = '{{$share->marginable}}';
                        </script>

                        @if ($errors->has('marginable'))
                            <span class="invalid-feedback" role="alert" style="top: 100%; margin-top: 5px">
                                <strong style="color: red">{{ $errors->first('marginable') }}</strong>
                            </span>
                        @endif
                    </span>

                    <span class="input radio-input @error('status') is-invalid @enderror">
                        <select class="select-option " id="status"  name="status">
                            <option value="" >Activation Status</option>
                            <option value="1" >Active</option>
                            <option value="0" >Not Active</option>
                        </select>
                        <script>
                        document.getElementById('status').value = '{{$share->status}}';
                    </script>

                        @if ($errors->has('status'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red">{{ $errors->first('status') }}</strong>
                            </span>
                        @endif
                    </span>
                </div>
                <div style="text-align: right">
                    <button class="form-submit-btn" type="submit">Update</button>
                </div>
            </form>

        </div>
    </div>



@endsection
