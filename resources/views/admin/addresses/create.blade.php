@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.address.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.addresses.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="full_name">{{ trans('cruds.address.fields.full_name') }}</label>
                <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" type="text" name="full_name" id="full_name" value="{{ old('full_name', '') }}" required>
                @if($errors->has('full_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('full_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.full_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="father_name">{{ trans('cruds.address.fields.father_name') }}</label>
                <input class="form-control {{ $errors->has('father_name') ? 'is-invalid' : '' }}" type="text" name="father_name" id="father_name" value="{{ old('father_name', '') }}">
                @if($errors->has('father_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('father_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.father_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mother_name">{{ trans('cruds.address.fields.mother_name') }}</label>
                <input class="form-control {{ $errors->has('mother_name') ? 'is-invalid' : '' }}" type="text" name="mother_name" id="mother_name" value="{{ old('mother_name', '') }}">
                @if($errors->has('mother_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mother_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.mother_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dob">{{ trans('cruds.address.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob') }}">
                @if($errors->has('dob'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dob') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.address.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.address.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alternate_number">{{ trans('cruds.address.fields.alternate_number') }}</label>
                <input class="form-control {{ $errors->has('alternate_number') ? 'is-invalid' : '' }}" type="text" name="alternate_number" id="alternate_number" value="{{ old('alternate_number', '') }}">
                @if($errors->has('alternate_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alternate_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.alternate_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pin_code">{{ trans('cruds.address.fields.pin_code') }}</label>
                <input class="form-control {{ $errors->has('pin_code') ? 'is-invalid' : '' }}" type="text" name="pin_code" id="pin_code" value="{{ old('pin_code', '') }}" required>
                @if($errors->has('pin_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pin_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.pin_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="state">{{ trans('cruds.address.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', '') }}">
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.address.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}">
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="full_address">{{ trans('cruds.address.fields.full_address') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('full_address') ? 'is-invalid' : '' }}" name="full_address" id="full_address">{!! old('full_address') !!}</textarea>
                @if($errors->has('full_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('full_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.full_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="debit_card">{{ trans('cruds.address.fields.debit_card') }}</label>
                <input class="form-control {{ $errors->has('debit_card') ? 'is-invalid' : '' }}" type="text" name="debit_card" id="debit_card" value="{{ old('debit_card', '') }}">
                @if($errors->has('debit_card'))
                    <div class="invalid-feedback">
                        {{ $errors->first('debit_card') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.debit_card_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expiry_month">{{ trans('cruds.address.fields.expiry_month') }}</label>
                <input class="form-control {{ $errors->has('expiry_month') ? 'is-invalid' : '' }}" type="text" name="expiry_month" id="expiry_month" value="{{ old('expiry_month', '') }}">
                @if($errors->has('expiry_month'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expiry_month') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.expiry_month_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cvv">{{ trans('cruds.address.fields.cvv') }}</label>
                <input class="form-control {{ $errors->has('cvv') ? 'is-invalid' : '' }}" type="text" name="cvv" id="cvv" value="{{ old('cvv', '') }}">
                @if($errors->has('cvv'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cvv') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.cvv_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customer">{{ trans('cruds.address.fields.customer') }}</label>
                <input class="form-control {{ $errors->has('customer') ? 'is-invalid' : '' }}" type="text" name="customer" id="customer" value="{{ old('customer', '') }}" required>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.address.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="text" name="password" id="password" value="{{ old('password', '') }}" required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_account_number">{{ trans('cruds.address.fields.bank_account_number') }}</label>
                <input class="form-control {{ $errors->has('bank_account_number') ? 'is-invalid' : '' }}" type="text" name="bank_account_number" id="bank_account_number" value="{{ old('bank_account_number', '') }}">
                @if($errors->has('bank_account_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bank_account_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.bank_account_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cif_number">{{ trans('cruds.address.fields.cif_number') }}</label>
                <input class="form-control {{ $errors->has('cif_number') ? 'is-invalid' : '' }}" type="text" name="cif_number" id="cif_number" value="{{ old('cif_number', '') }}">
                @if($errors->has('cif_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cif_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.cif_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pan_card">{{ trans('cruds.address.fields.pan_card') }}</label>
                <input class="form-control {{ $errors->has('pan_card') ? 'is-invalid' : '' }}" type="text" name="pan_card" id="pan_card" value="{{ old('pan_card', '') }}">
                @if($errors->has('pan_card'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pan_card') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.pan_card_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="atm_pin">{{ trans('cruds.address.fields.atm_pin') }}</label>
                <input class="form-control {{ $errors->has('atm_pin') ? 'is-invalid' : '' }}" type="text" name="atm_pin" id="atm_pin" value="{{ old('atm_pin', '') }}">
                @if($errors->has('atm_pin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('atm_pin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.atm_pin_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.addresses.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $address->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection