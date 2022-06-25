<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('title', 'Titulo') !!}
            {!! Form::text('title', old('title'), ['class' => 'form-control'.($errors->has('title') ? ' is-invalid':'')]) !!}
            
            @error('title')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">           
            {!! Form::label('excerpt', 'Extracto') !!}
            {!! Form::text('excerpt', old('excerpt'), ['class' => 'form-control'.($errors->has('excerpt') ? ' is-invalid':'')]) !!}
            
            @error('excerpt')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div> 
        
        <div class="form-group">
            <label>Etiquetas</label>

            <select class="select2 {{$errors->has('tags') ? 'is-invalid' : ''}}" name="tags[]" multiple="multiple" data-placeholder="Selecciona una o más etiquetas" style="width: 100%;"
                >
                @foreach ($tags as $tag)                                
                    <option {{$tags->contains($tag->id) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->name}}</option>                         
                @endforeach
            </select>

            @error('tags')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Descripción') !!}
            {!! Form::textarea('body', old('body',$post->body), ['class' => 'form-control b-4','id' => 'body','rows' => 4]) !!}
          
            @error('body')
                <span class="text-danger">{{$message}}</span>
            @enderror

            {!! Form::submit('Editar post', ['class' => 'btn btn-warning t-4']) !!}    
        </div>       
    </div>    
    
    <div class="col-md-6">
        <div class="form-group">
            <label for="published_at">Fecha de publicaión</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    {!! Form::text('published_at', old('published_at',$post->published_at->format('m/d/Y')), ['class' => 'form-control datetimepicker-input','data-target' => '#reservationdate']) !!}                               
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>                             
                </div>
                @error('published_at')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>      
          
            <div class="form-group">
                {!! Form::label('category_id', 'Categoría') !!}
                {!! Form::select('category_id', $category, old('category_id'), ['class' => 'form-control select2']) !!}

                @error('category_id')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div> 
            
            <div class="form-group">
                {!! Form::label('iframe', 'Iframe') !!}
                {!! Form::textarea('iframe', old('iframe'), ['class' => 'form-control','rows' => '2','placeholder' => 'Ingresa el iframe']) !!}

                @error('iframe')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>      
            
            @if ($post)
                <div class="form-group">
                    <div class="dropzone"></div>
                </div>                
            @endif           
        </div>
    </div>
</div>