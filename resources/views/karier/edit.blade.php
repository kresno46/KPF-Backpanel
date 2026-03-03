@extends('layouts.admin')

@section('namaPage', 'Edit Lowongan Kerja')

@section('main-content')
@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger border-left-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Lowongan Kerja</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('karier.update', $karier) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_kota">Nama Kota</label>
                            <input type="text" class="form-control @error('nama_kota') is-invalid @enderror" id="nama_kota" name="nama_kota" value="{{ old('nama_kota', $karier->nama_kota) }}" required autofocus>
                            @error('nama_kota')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="posisi">Posisi</label>
                            <input type="text" class="form-control @error('posisi') is-invalid @enderror" id="posisi" name="posisi" value="{{ old('posisi', $karier->posisi) }}" required>
                            @error('posisi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $karier->email) }}" required>
                            <small class="form-text text-muted">Email yang akan menerima notifikasi lamaran</small>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="responsibilities">Tanggung Jawab</label>
                            <textarea class="form-control @error('responsibilities') is-invalid @enderror" 
                                id="responsibilities" 
                                name="responsibilities" 
                                rows="8">{{ old('responsibilities', $karier->responsibilities) }}</textarea>
                            @error('responsibilities')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="qualifications">Kualifikasi</label>
                            <textarea class="form-control @error('qualifications') is-invalid @enderror" 
                                id="qualifications" 
                                name="qualifications" 
                                rows="8">{{ old('qualifications', $karier->qualifications) }}</textarea>
                            @error('qualifications')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route('karier.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/{{ config('services.tinymce.key') }}/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
<script>
    // Hapus instance TinyMCE yang mungkin sudah ada
    if (typeof tinymce !== 'undefined') {
        tinymce.remove();
    }
    
    // Inisialisasi TinyMCE dengan timeout untuk memastikan DOM siap
    tinymce.init({
            paste_data_images: false,
            automatic_uploads: true,
            images_upload_handler: window.tinyMceImageUploadHandler,
        selector: '#responsibilities, #qualifications',
        height: 400,
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount textpattern noneditable help charmap quickbars emoticons',
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | fontselect fontsizeselect | link image media | fullscreen preview code',
        font_formats: 'Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats',
        fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt',
        toolbar_mode: 'sliding',
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        image_advtab: true,
        branding: false,
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        setup: function(editor) {
            editor.on('change', function() {
                editor.save();
            });
        },
        init_instance_callback: function(editor) {
            // Pastikan konten yang ada sudah diproses dengan benar
            editor.setContent(editor.getContent());
        },
        style_formats: [
            { title: 'Headings', items: [
                { title: 'Heading 1', format: 'h1' },
                { title: 'Heading 2', format: 'h2' },
                { title: 'Heading 3', format: 'h3' },
                { title: 'Heading 4', format: 'h4' },
                { title: 'Heading 5', format: 'h5' },
                { title: 'Heading 6', format: 'h6' }
            ]},
            { title: 'Inline', items: [
                { title: 'Bold', icon: 'bold', format: 'bold' },
                { title: 'Italic', icon: 'italic', format: 'italic' },
                { title: 'Underline', icon: 'underline', format: 'underline' },
                { title: 'Strikethrough', icon: 'strikethrough', format: 'strikethrough' },
                { title: 'Superscript', icon: 'superscript', format: 'superscript' },
                { title: 'Subscript', icon: 'subscript', format: 'subscript' },
                { title: 'Code', icon: 'code', format: 'code' }
            ]}
        ]
    });
</script>
@endpush



