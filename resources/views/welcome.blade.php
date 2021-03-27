<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <title>CV Creator</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">

    <style>
        .custom-notification {
            margin: 2rem auto 0 !important;
        }
    </style>
</head>
<body>
<section class="hero is-fullheight">
    @if (session('status'))
        <div class="block custom-notification">
            <div class="notification is-success">
                <button class="delete"></button>
                {{ session('status') }}
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="block custom-notification">
            <div class="notification is-danger">
                <button class="delete"></button>
                {{ session('error') }}
            </div>
        </div>
    @endif
    <div class="hero-body">
        <div class="container">
            <form method="POST" action="{{route('send-mail')}}" enctype="multipart/form-data">
                @csrf

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Remitente</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('name') is-danger @enderror" type="text" name="name"
                                       value="{{ old('name') }}"
                                       placeholder="Nombre">
                                <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                            </p>
                            @error('name')
                            <p class="help is-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <div class="field">
                            <p class="control is-expanded has-icons-left">
                                <input class="input @error('email') is-danger @enderror" type="email" name="email"
                                       value="{{ old('email') }}"
                                       placeholder="Email">
                                <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                            </p>
                            @error('email')
                            <p class="help is-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label"></div>
                    <div class="field-body">
                        <div class="field is-narrow">
                            <div class="field has-addons">
                                <p class="control">
                                    <a class="button is-static">
                                        +34
                                    </a>
                                </p>
                                <p class="control is-expanded">
                                    <input class="input @error('tel') is-danger @enderror" type="tel" name="tel"
                                           value="{{ old('tel') }}"
                                           placeholder="Teléfono">
                                </p>
                            </div>
                            @error('tel')
                            <p class="help is-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Adjunto</label>
                    </div>
                    <div class="field-body">
                        <div class="field is-narrow">
                            <div class="file @error('file') is-danger @enderror">
                                <label class="file-label">
                                    <input class="file-input" type="file"
                                           name="file" id="fileUpload">
                                    <span class="file-cta">
                                  <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                  </span>
                                  <span class="file-label">
                                    Elige un archivo…
                                  </span>
                                </span>
                                </label>
                            </div>
                            @error('file')
                            <p class="help is-danger">
                                {{ $message }}
                            </p>
                            @enderror
                            <p class="help is-success" id="fileUploaded" style="display: none">
                                ¡Archivo cargado correctamente!
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Asunto</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input @error('subject') is-danger @enderror" type="text" name="subject"
                                       value="{{ old('subject') }}"
                                       placeholder="e.j Currículum online">
                            </div>
                            @error('subject')
                            <p class="help is-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Detalles</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <textarea class="textarea @error('details') is-danger @enderror" name="details"
                                          placeholder="Explica los detalles...">{{ old('details') }}</textarea>
                            </div>
                            @error('details')
                            <p class="help is-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label">
                        <!-- Left empty for spacing -->
                    </div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-info" type="submit">
                                    Enviar mensaje
                                </button>
                            </div>
                            <div class="control">
                                <button class="button is-link is-light" type="reset" id="btnReset">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        (document.querySelectorAll('.custom-notification .notification .delete') || []).forEach(($delete) => {
            const $notification = $delete.parentNode;
            const $cNotification = $notification.parentNode;

            $delete.addEventListener('click', () => {
                $cNotification.parentNode.removeChild($cNotification);
            });
        });
    });

    const $fileUpload = document.getElementById('fileUpload');
    const $fileUploaded = document.getElementById('fileUploaded');
    $fileUpload.addEventListener('change', () => {
        if ($fileUpload.value === null || $fileUpload.value === undefined || $fileUpload.value.length < 1) {
            $fileUploaded.style.display = 'none';
            $fileUpload.value = '';
        }
        $fileUploaded.style.display = 'block';
    });

    const $btnReset = document.getElementById('btnReset');
    $btnReset.addEventListener('click', () => {
        $fileUploaded.style.display = 'none';
    });
</script>

</body>
</html>
