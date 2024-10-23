<div class="row justify-content-md-center">
    <div class="col-12">
        <ul class="list-group">
            @foreach ($translations as $translation)
                <li class="list-group-item">
                    <div>
                        <span class="badge bg-primary">{{ strtoupper($translation->language_from) }}</span>
                        <span class="badge bg-success">{{ strtoupper($translation->language_to) }}</span>
                        
                        <p> <span class="fw-bold">Texto Original: </span> {{ $translation->text_input }}</p>
                        
                        <p> <span class="fw-bold">Tradução: </span> {{ $translation->text_output }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
