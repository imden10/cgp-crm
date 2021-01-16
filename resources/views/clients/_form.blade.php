<?php
use App\Models\Clients;
/* @var Clients $model */
/* @var string $action */

$edit = false;
if(isset($action) && $action == 'edit'){
    $edit = true;
}
?>

<form id="modelForm" method="post" action="{{$edit ? route('clients.update', $model->id) : route('clients.store')}}">
    @csrf
    @if($edit) @method('PATCH') @endif
    <div class="row">
        <div class="col-6">
            <div class="form-group select2-style">
                <label for="exampleInputCompanyId">Select company</label>
                <select name="company_id" class="form-control" id="exampleInputCompanyId">
                    @if($edit)
                        <option value="{{$model->getCompanyId()}}">{{$model->company->getName()}}</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputFirstname">Firstname</label>
                <input type="text" name="firstname" value="{{$edit ? $model->getFirstname() : old('firstname')}}" class="form-control" id="exampleInputFirstname" placeholder="Enter firstname" aria-describedby="exampleInputFirstname-error" aria-invalid="true">
            </div>
            <div class="form-group">
                <label for="exampleInputLastname">Lastname</label>
                <input type="text" name="lastname" value="{{$edit ? $model->getLastname() : old('lastname')}}" class="form-control" id="exampleInputLastname" placeholder="Enter lastname" aria-describedby="exampleInputLastname-error" aria-invalid="true">
            </div>
            <div class="form-group">
                <label for="exampleInputMiddlename">Middlename</label>
                <input type="text" name="middlename" value="{{$edit ? $model->getMiddlename() : old('middlename')}}" class="form-control" id="exampleInputMiddlename" placeholder="Enter middlename" aria-describedby="exampleInputMiddlename-error" aria-invalid="true">
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
                <label for="exampleInputAddress">Address</label>
                <input type="text" name="address" value="{{$edit ? $model->getAddress() : old('address')}}" class="form-control" id="exampleInputAddress" placeholder="Enter address" aria-describedby="exampleInputAddress-error" aria-invalid="true">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" id="submit">{{$edit ? 'Update' : 'Create'}}</button>
</form>

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        if ($("#modelForm").length > 0) {
            $("#modelForm").validate({
                errorClass: 'is-invalid',
                errorElement: 'span',
                rules: {
                    firstname: {
                        required: true,
                        maxlength: 50
                    },
                    lastname: {
                        required: true,
                        maxlength: 50
                    },
                    middlename: {
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
                    address: {
                        maxlength: 191
                    }
                },
                messages: {
                    firstname: {
                        required: "Please enter firstname",
                        maxlength: "Client firstname maxlength should be 50 characters long."
                    },
                    lastname: {
                        required: "Please enter name",
                        maxlength: "Client lastname maxlength should be 50 characters long."
                    },
                    middlename: {
                        required: "Please enter name",
                        maxlength: "Client middlename maxlength should be 50 characters long."
                    },
                    email: {
                        required: "Please enter email",
                        email: "Email is not valid",
                        maxlength: "The email name should less than or equal to 50 characters",
                    },
                    phone: {
                        maxlength: "The phone should less than or equal to 20 characters"
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
            $('#summernote').summernote();

            $('#exampleInputCompanyId').select2({
                ajax: {
                    url: '{{route('companies-get-list')}}',
                    type: 'GET',
                    dataType: 'json',
                    data: function (params) {
                        let query = {
                            search: params.term
                        }
                        return query;
                    }
                },
                minimumInputLength: 1,
            });
        })
    </script>
@endpush

@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        span.is-invalid {
            width: 100%;
            margin-top: .25rem;
            font-size: 80%;
            color: #dc3545;
        }
        .select2-style .select2-container .select2-selection--single {
            height: 40px;
        }
        .select2-style .select2-container--default .select2-selection--single .select2-selection__arrow b {
            margin-top: 5px;
        }
    </style>
@endpush
