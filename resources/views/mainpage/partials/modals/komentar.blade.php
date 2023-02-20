<div class="modal fade" id="komentarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="examplModalLabel"> Beri Komentar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                 <form action="/komentar" method="post">
                    <div class="modal-body">
                       
                    @csrf
                        @if ($komentarUser == null)
                            <textarea name="komentar" class="w-100" rows="7" style="resize: none"></textarea>
                        @else
                            <textarea name="komentar" disabled class="w-100" id="" cols="30" rows="7" style="resize: none">{{ @$komentarUser->komentar }}</textarea>
                        @endif
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tutup</button>
                            @if($komentarUser == null)
                                <button type="submit" class="btn btn-primary"> simpan komentar</button>
                            @endif
                
                </form>
            </div>
        </div>
    </div>
</div>
