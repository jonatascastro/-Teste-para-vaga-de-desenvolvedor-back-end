@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                        <div class="container-fluid">
                        
                      <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#cadastro">Cadastro</a></li>
                        <li><a data-toggle="tab" href="#listar">Menu 1</a></li>
                      </ul>

                    <div class="tab-content">
                      <div id="cadastro" class="tab-pane fade in active">
                    
                        <div class="card card-default">
                             
                        
                              <div class="card-body">
                                <div class="row">
                                                                  
  
                                      <div class="form-group col-3">
                                        <label for="cpf">CPF</label>
                                        <input type="text" class="form-control" id="cpf" placeholder="Digite cpf" data-inputmask='"mask": "999.999.999-99"' data-mask>
                                      </div>
                                      
                                      <div class="form-group col-3">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" placeholder="Nome">
                                      </div>
                                      
                                      <div class="form-group col-3">
                                        <label for="nome">Data Nascimento</label>
                                        <input type="text" class="form-control" id="nascimento" placeholder="Data de nascimento" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                      </div>
                                  
                                      
                                      <div class="form-group  col-3">
                                          <label for="genero">Gênero</label>
                                          <div class="form-check">
                                              <input type="radio" class="form-check-input" id="genero_masculino" name="genero" value="M">
                                              <label class="form-check-label" for="genero_masculino">Masculino</label>
                                          </div>
                                          <div class="form-check">
                                              <input type="radio" class="form-check-input" id="genero_feminino"   
                                            name="genero" value="F">
                                              <label class="form-check-label" for="genero_feminino">Feminino</label>
                                          </div>
                                      </div>
                                    
                                      <div class="form-group col-3">
                                        <label for="nome">Endereço</label>
                                        <input type="text" class="form-control" id="endereco" placeholder="Nome">
                                      </div>
                                      <div class="form-group col-3">
                                            <label for="estado">Estado</label>
                                            <select class="form-control" id="estado" >
                                                <option value="">Selecione</option>
                                                @foreach (App\Models\Estados::get() as $estado)
                                                    <option value="{{ $estado->id }}">{{ $estado->nome }}</option>
                                                @endforeach  
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-3">
                                              <label for="cidade">Cidade</label>
                                              <select class="form-control" id="cidade">
                                                  <option value="">Selecione</option>
                                                  <!-- Cidades serão carregadas dinamicamente aqui -->
                                              </select>
                                          </div>
                                        
                                        <div class="form-group  col-12">
                                        
                                        <button type="button" id="btnCadastro" class="btn btn-success">Salvar</button>
                                        <button type="button" class="btn btn-danger">Fechar</button>
                                        
                                            </select>
                                        </div>
                         
                                </div>
                    
                              </div>
                              
                            </div>
                      </div>
                      <div id="listar" class="tab-pane fade">
                        <h3>Listar</h3>
                        <p>Descupe mas não deu para fazer apenas o listar e corrigir pequenos erro</p>
                      </div>
                      
                    </div>     
              </div>
                    
              <div class="container-fluid">   
              <hr>          
                  <div class="card">
                    <table id="table"  class="table table-bordered table-striped">                                <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Cpf</th>                           
                                <th>Data Nasc.</th>
                                <th>Estado</th>
                                <th>Cidade </th>
                                <th>Sexo</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                              
                  </div>  
             </div>
                    
           
             
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        
  
        
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('./plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('./plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
      
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/responsive/1.0.2/js/dataTables.responsive.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/a5734b29083/integration/bootstrap/3/dataTables.bootstrap.js"></script>

<link rel="stylesheet" href="{{asset('./plugins/toastr/toastr.min.css')}}">
<link rel="stylesheet" href="{{asset('./plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('./plugins/fontawesome-free/css/all.min.css')}}">

<script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('./plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('./plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('./plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('./plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('./plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
    

      $(document).on('change','#estado',function() {
            var estadoId = $('#estado').val();
            $('#cidade').empty().append('<option value="">Selecione</option>'); // Limpa as cidades antes de carregar
        
            if (estadoId) {
                $.ajax({
                    url: "{{route('home.getCidadesPorEstado')}}", // URL da sua rota para buscar cidades
                    method: 'Post',
                    data:{estadoId:estadoId},
                    dataType: 'JSON',
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Certifique-se de que o token CSRF está incluído
                    },               
                    success: function(cidades) {
                        cidades.forEach(function(cidade) {
                            $('#cidade').append('<option value="' + cidade.nome + '">' + cidade.nome + '</option>');
                        });
                    },
                    error: function() {
                        console.error('Erro ao carregar cidades.');
                    }
                });
            }
        })
       //Datemask dd/mm/yyyy
       $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()
      
        $("#btnCadastro").on("click", function(){
                  
              $.ajax({
                url: "{{route('home.create')}}",
                method: "POST",
                dataType: 'JSON',
                data: {cpf:$("#cpf").val(),nome:$('#nome').val(),
                nascimento:$("#nascimento").val(),genero_masculino:$("#genero_masculino").val(),
                genero_feminino:$("#genero_feminino").val(),endereco:$("#endereco").val(),
                estado:$("#estado").val(),cidade:$("#cidade").val()}, 
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Certifique-se de que o token CSRF está incluído
                },
                success: function(response) {
                    if (response.success) {
                      Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: response.mensagem,
                            showConfirmButton: false,
                            timer: 1500
                          });
                      
                        $("#table").DataTable().ajax.reload(); // Recarregar os dados do DataTable sem resetar a paginação
                    } else {
                      Swal.fire({
                          icon: "error",
                          title: "Oops...",
                          text: response.mensagem,
                         
                        });
                       
                    }
                },
                error: function() {
                    
                
                }
            });

        })
        
           var table = $('#table').DataTable({
               dom: 'Blfrtip',
                responsive: true,
                lengthChange: true, 
                autoWidth: false,
                processing: true,
                recalc: true,
                ajax:
                  {
                    type:'get',
                    url: "{{route('home.listar')}}",
                    dataType: 'json',
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                  },
                  language: 
                  {
                        "url": '{{asset("https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json")}}',
                  },
                  columnDefs: [{
                        orderable: false,
                        width: '100px', targets: '_all' ,
                    
                      }],
                  columns:
                  [
                 
                      {data: 'nome'},
                      {data: 'cpf'},
                      {data: 'nascimento'},
                      {data: 'estado'},
                      {data: 'cidade'},
                      {data: 'sexo'},
                      {data: 'editar',
                        render: function (data, type, row) {
                            return '<a href="javascript:void(0)" type="button" class="btn btn-primary editar" data-id="'+row.id+'" "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>';
                        }
                      },
                      {data: 'excluir',
                      render: function (data, type, row) {
                          return '<a href="javascript:void(0) type="button" class="btn btn-danger excluir" data-id="'+row.id+'" "><i class="fa fa-trash-o" aria-hidden="true"></i> Excluir</a>';
                      }}
                  ],
                  drawCallback: function(settings) {
                    var api = this.api();
                              
                    $(document).on("click",".excluir", function(){
                    var id=$(this).data('id');
                        $.ajax({
                          url: "{{route('home.delete')}}",
                          method: "delete",
                          dataType: 'JSON',
                          data: {id:id},    
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Certifique-se de que o token CSRF está incluído
                          },
                          success: function(response) {
                              if (response.success) {
                                Swal.fire({
                                      position: "top-end",
                                      icon: "success",
                                      title: response.mensagem,
                                      showConfirmButton: false,
                                      timer: 1500
                                    });
                                
                                  $("#table").DataTable().ajax.reload(); // Recarregar os dados do DataTable sem resetar a paginação
                              } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: response.mensagem,
                                   
                                  });
                                 
                              }
                          },
                          error: function() {
                              
                          
                          }
                      });
              
                  })
      
                  
              $(document).on('click','.editar',function() {
                var row = $(this).closest('tr');// Tenta encontrar a linha mais próxima
            
                var rowData = api.row(row).data(); // Obtém os dados da linha atualizados
                 
                    var html = '<div class="card-body">'+
                    '<div class="row">'+                                                                  
                        '<div class="form-group col-6 text-left">'+
                            '<label for="cpf">CPF</label>'+
                            '<input type="text" value="'+rowData.cpf+'" class="form-control" id="cpf_editar" placeholder="Digite CPF" data-inputmask=\'"mask": "999.999.999-99\' data-mask>'+
                        '</div>'+                                      
                        '<div class="form-group col-6 text-left">'+
                            '<label for="nome">Nome</label>'+
                            '<input type="text" value="'+rowData.nome+'" class="form-control" id="nome_editar" placeholder="Nome">'+
                        '</div>'+                                      
                        '<div class="form-group col-6 text-left">'+
                            '<label for="nascimento">Data Nascimento</label>'+
                            '<input type="text" value="'+rowData.nascimento+'" class="form-control" id="nascimento_editar" placeholder="Data de nascimento" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>'+
                        '</div>'+                                      
                        '<div class="form-group col-6 text-left">'+
                            '<label for="genero">Gênero</label>'+
                            '<select class="form-control" id="sexo_editar">'+
                                '<option value="M"' + (rowData.sexo === 'M' ? ' selected' : '') + '>Masculino</option>'+                         
                                '<option value="F"' + (rowData.sexo === 'F' ? ' selected' : '') + '>Feminino</option>'+                
                            '</select>'+
                        '</div>'+                                    
                        '<div class="form-group col-6 text-left">'+
                            '<label for="endereco">Endereço</label>'+
                            '<input value="'+rowData.endereco+'" type="text" class="form-control" id="endereco_editar" placeholder="Endereço">'+
                        '</div>'+                                      
                        '<div class="form-group col-6 text-left">'+
                            '<label for="estado">Estado</label>'+
                            '<input value="'+rowData.estado+'" type="text" class="form-control" id="estado_editar" placeholder="Estado">'+
                        '</div>'+                                      
                        '<div class="form-group col-6 text-left">'+
                            '<label for="cidade">Cidade</label>'+
                            '<input value="'+rowData.cidade+'" type="text" class="form-control" id="cidade_editar" placeholder="Cidade">'+
                        '</div>'+                                      
                    '</div>'+
                '</div>';

                        Swal.fire({
                            title: "Editar Dados",
                            html:html,
                            inputAttributes: {
                              autocapitalize: "off"
                            },
                            showCancelButton: true,
                            confirmButtonText: "Salvar",
                            cancelButtonText: "Fechar",
                            showLoaderOnConfirm: true,
                          
                        
                          }).then((result) => {
                            if (result.isConfirmed) {
                            
                              $.ajax({
                                    url: "{{route('home.update')}}", // URL da sua rota para buscar cidades
                                    method: 'put',
                                    data: {id:rowData.id,cpf:$("#cpf_editar").val(),nome:$('#nome_editar').val(),
                                    nascimento:$("#nascimento_editar").val(),
                                    sexo:$("#sexo_editar").val(),endereco:$("#endereco_editar").val(),
                                    estado:$("#estado_editar").val(),cidade:$("#cidade_editar").val()}, 
                                    dataType: 'JSON',
                                    headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Certifique-se de que o token CSRF está incluído
                                    },               
                                    success: function(response) {
                                      if (response.success) {
                                Swal.fire({
                                      position: "top-end",
                                      icon: "success",
                                      title: response.mensagem,
                                      showConfirmButton: false,
                                      timer: 1500
                                    });
                                
                                  $("#table").DataTable().ajax.reload(); // Recarregar os dados do DataTable sem resetar a paginação
                              } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: response.mensagem,
                                   
                                  });
                                 
                              }
                                    },
                                    error: function() {
                                        console.error('Erro ao carregar cidades.');
                                    }
                                });
                            
                            
                              $("#table").DataTable().ajax.reload(); // Recarregar os dados do DataTable sem resetar a paginação
                              
                            }
                          });
                      
                      });
               
                
                  }
              });
             
            });
            
           
          </script>
    
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
