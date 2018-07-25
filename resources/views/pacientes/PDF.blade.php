<h5> Ficha de paciente: {{ $paciente->fullName }}</h5>

<table width="100%">
    <tr>
        <td>Nombre paciente:</td>
        <td>{{ $paciente->fullName }}</td>
    </tr>

    <tr>
        <td>RUT paciente:</td>
        <td>{{ $paciente->rut }}</td>
    </tr>

    <tr>
        <td>Pais:</td>
        <td>@if($paciente->pais) {{ $paciente->pais->nombre }} @endif</td>
    </tr>

    <tr>
        <td>Comuna:</td>
        <td>@if($paciente->comuna) {{ $paciente->comuna->nombre }} @endif</td>
    </tr>

</table>