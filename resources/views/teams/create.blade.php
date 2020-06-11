@extends('layouts.app')

@section('content')
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Skapa lag</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('teams.store') }}">
                        @csrf
                            <div class="form-group row">
                              

                                <label for="activitySelect" class="col-md-4 col-form-label text-md-right">{{ __('Aktivitet') }}</label>
                                
                                
                              <div class="col-md-6">
                              <select class="custom-select" id="activitySelect" name="activity_id">
                                <option selected>Välj Aktivitet...</option>
                                @foreach ($activities as $activity)
                              <option value="{{ $activity->id }}">{{ $activity->activity }}</option>
                                @endforeach
                      
                              </select>
                            </div>
                          </div>

                        <div class="form-group row">
                            <label for="teamName" class="col-md-4 col-form-label text-md-right">{{ __('Lag Namn') }}</label>
                            
                            <div class="col-md-6">
                                <input id="teamName" type="text" class="form-control @error('teamName') is-invalid @enderror" name="teamName" value="{{ old('teamName') }}" required autocomplete="teamName" autofocus>

                                @error('teamName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                        </div>
                          <div class="row">
                            <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-outline-primary w-100">Lägg till</button>                        
                            </div>                    
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection