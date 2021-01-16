<?php
use App\Models\Companies;
/* @var Companies $model */
/* @var string $action */

$edit = false;
if(isset($action) && $action == 'edit'){
    $edit = true;
}
?>

<form id="modelForm" method="post" action="{{$edit ? route('companies.update', $model->id) : route('companies.store')}}" enctype="multipart/form-data">
    @csrf
    @if($edit) @method('PATCH') @endif
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="exampleInputName">Company name</label>
                <input type="text" name="name" value="{{$edit ? $model->getName() : old('name')}}" class="form-control" id="exampleInputName" placeholder="Enter name" aria-describedby="exampleInputName-error" aria-invalid="true">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" value="{{$edit ? $model->getEmail() : old('email')}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email" aria-describedby="exampleInputEmail1-error" aria-invalid="true">
            </div>
            <div class="form-group">
                <label for="exampleInputPhone">Phone</label>
                <input type="text" name="phone" value="{{$edit ? $model->getPhone() : old('phone')}}" class="form-control" id="exampleInputPhone" placeholder="Enter phone" aria-describedby="exampleInputPhone-error" aria-invalid="true">
            </div>
            <div class="form-group">
                <label for="exampleInputWebsite">Website</label>
                <input type="text" name="website" value="{{$edit ? $model->getWebsite() : old('website')}}" class="form-control" id="exampleInputWebsite" placeholder="Enter website" aria-describedby="exampleInputWebsite-error" aria-invalid="true">
            </div>
            <div class="form-group">
                <label for="exampleInputAddress">Address</label>
                <input type="text" name="address" value="{{$edit ? $model->getAddress() : old('address')}}" class="form-control" id="exampleInputAddress" placeholder="Enter address" aria-describedby="exampleInputAddress-error" aria-invalid="true">
            </div>
        </div>
        <div class="col-6">
            <textarea name="description" id="summernote" cols="30" rows="10">{{$edit ? $model->getDescription() : old('description')}}</textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" id="submit">{{$edit ? 'Update' : 'Create'}}</button>
</form>

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        if ($("#modelForm").length > 0) {
            $("#modelForm").validate({
                errorClass: 'is-invalid',
                errorElement: 'span',
                rules: {
                    name: {
                        required: true,
                        maxlength: 50
                    },
                    email: {
                        required: true,
                        maxlength: 50,
                        email: true,
                    },
                    phone: {
                        maxlength: 20
                    },
                    website: {
                        maxlength: 50
                    },
                    address: {
                        maxlength: 191
                    }
                },
                messages: {
                    name: {
                        required: "Please enter name",
                        maxlength: "Company name maxlength should be 50 characters long."
                    },
                    email: {
                        required: "Please enter email",
                        email: "Email is not valid",
                        maxlength: "The email name should less than or equal to 50 characters",
                    },
                    phone: {
                        maxlength: "The phone should less than or equal to 20 characters"
                    },
                    website: {
                        maxlength: "The website name should less than or equal to 50 characters"
                    },
                    address: {
                        maxlength: "The address name should less than or equal to 191 characters"
                    }
                },
                submitHandler: function(form) {
                    return true;
                }
            })
        }

        $(function () {
            // Summernote
            $('#summernote').summernote()
        })
    </script>
@endpush

@push('style')
    <style>
        span.is-invalid {
            width: 100%;
            margin-top: .25rem;
            font-size: 80%;
            color: #dc3545;
        }
    </style>
@endpush
