<div aria-hidden="true" role="dialog" tabindex="-1"
    id="uploadImageModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">{{ trans('common.modal.upload_image') }}</h4>
            </div>
            <div class="modal-body form-horizontal">
                {!! Form::open(['url' => route('admin.image.store'),
                    'method' => 'post', 'id' => 'upload-image-form',
                    'files' => true]) !!}
                    @include ('backend.pages.image._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
