<div aria-hidden="true" role="dialog" tabindex="-1"
     id="destroyModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">{{ trans('common.modal.destroy') }}</h4>
            </div>
            <div class="modal-body form-horizontal">
                <div class="col-sm-12" id="modal-text"></div>
                <div class="col-sm-12">
                    {!! Form::open(['id' => 'destroy-form', 'method' => 'DELETE']) !!}
                        {!! Form::submit(trans('common.destroy'),
                        ['class' => 'btn btn-danger col-sm-4']) !!}
                    {!! Form::close() !!}
                    <button data-dismiss="modal" type="button"
                        class="btn btn-default col-sm-4 col-sm-offset-4">
                        {{ trans('common.cancel') }}
                    </button>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
