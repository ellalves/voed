@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label for="plan_id"> Plano *: </label>
    @if (empty($tenant))
    <select name="plan_id" id="plan_id" class="form-control js-basic-single">
        @foreach ($plans as $plan)
            <option value="{{$plan->id}}"> {{$plan->name}} </option>
        @endforeach
    </select>
    @else
        {{$tenant->plan->name}}
        <input name="plan_id" type="hidden" value="{{$tenant->plan->id}}">
    @endif
</div>

<div class="form-group">
    <label for="name"> Nome do responsável *: </label>
    @if (empty($tenant))
        <input type="text" name="name" value="{{ $tenant->name ?? old('name') }}" class="form-control" placeholder="Nome do responsável">
    @else
        {{$user->name}}
        <input name="name" type="hidden" value="{{$user->name}}">
    @endif
</div>

<div class="form-group">
    <label for="name"> Nome da empresa *: </label>
    <input type="text" name="company" value="{{ $tenant->name ?? old('company') }}" class="form-control" placeholder="Nome da empresa:">
</div>

<div class="form-group">
    <label for="document"> Documento *: </label>
    <input type="text" name="document" value="{{ $tenant->document ?? old('document') }}" class="form-control" placeholder="CNPJ ou CPF:">
</div>

<div class="form-group">
    <label for="email"> E-mail *: </label>
    <input type="text" name="email" value="{{ $tenant->email ?? old('email') }}" class="form-control" placeholder="E-mail:">
</div>

<div class="form-group">
    <label for="logo"> Logo: </label>
    <div class="custom-file">
      <input type="file" name="logo" class="custom-file-input" id="logo">
      <label class="custom-file-label" for="logo">Escolha uma logo</label>
    </div>
</div>

<div class="form-group">
    <label>* Ativo?</label>
    <select name="active" class="form-control">
        <option value="Y" @if(isset($tenant) && $tenant->active == 'Y') selected @endif >Sim</option>
        <option value="N" @if(isset($tenant) && $tenant->active == 'N') selected @endif>Não</option>
    </select>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-info"> 
        <i class="fa fa-save"></i> Salvar 
    </button>
</div>