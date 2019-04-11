@extends('main')

@section('content')
    <div id="app" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add files</div>

                    <div class="card-body">
                        <upload-files :input_name="'users[]'" :post_url="'files/upload-file'"></upload-files>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="js/app.js"></script>
@endsection