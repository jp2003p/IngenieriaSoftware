<section class="container mt-5" id="comments">
    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header">Comentarios</div>
                <div class="card-body mb-2">
                    @foreach ($comments as $comment)
                        <span>{{ $comment->user->name }}</span>
                        <div wire:key="{{ $comment->id }}" class="mb-3">
                            <div class="card">
                                <div class="card-body" id="comment{{ $comment->id }}">
                                    {!! $comment->comment !!}
                                </div>
                            </div>
                            @if ($comment->user_id == $user->id)
                                <span>
                                    <button class="btn
                                btn-light"
                                        wire:click='delete({{ $comment->id }})'>
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </span>
                                <span>
                                    <button class="btn btn-light edit" value="{{ $comment->id }}">
                                        <i class="bi bi-pen-fill"></i>
                                    </button>
                                </span>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-8">
                            <div wire:ignore>
                                @once
                                    <div id="editor-container">
                                        <div id="editor">

                                        </div>
                                    </div>
                                @endonce
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary" id="publish">Publicar comentario</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('script-comment')
        <script>
            let editor;
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    toolbar: ['bold', 'italic', 'underline', 'strikethrough'],
                })
                .then(editorInstance => {
                    editor = editorInstance;
                })
                .catch(error => {
                    console.error('Error al iniciar el editor:', error);
                });

            const buttonPublish = document.getElementById('publish');
            buttonPublish.addEventListener('click', function() {
                Livewire.dispatch('add-comment', {
                    comment: editor.getData()
                });
            });


            const buttonsEditComment = document.querySelectorAll('.edit');

            buttonsEditComment.forEach(b => {
                b.addEventListener('click', () => {
                    const div = document.getElementById('comment' + b.value);
                    div.setAttribute("contenteditable", true);
                    div.classList.add("editable");
                    div.focus();

                    div.addEventListener('blur', () => {
                        Livewire.dispatch('update-comment', {
                            id: b.value,
                            comment: div.textContent
                        });
                    });
                });
            });
        </script>
    @endpush

</section>
