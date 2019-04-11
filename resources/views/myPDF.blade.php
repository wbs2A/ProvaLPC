
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="pt-br">
<head>
    <meta name="robots" content="noindex, nofollow" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Voucher da Reserva</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; text-align:justify;">
<div class="container" style="border: 1px solid black">
    <div class="row">
        <div class="col"><p class="lead">Este documento deverá ser impresso e entregue à locadora no dia da retirada do carro.</p></div>
    </div>
    <div class="row">
        <div class="col">
            <div style="border:1px solid #CCC; padding:5px; margin:5px 5px 5px 0;" align="center">
                <div class="display-2"><span class="h1" style="font-size: 25px">Locadora</span><span class="h1" style="font-size: 25px;color: #fab700">DAHORA</span></div>
                <br />
                <br />
                <strong>Entregue por:</strong> {{$empresa}}
            </div>
        </div>
        <div class="col" style="border: 1px solid #CCC; padding: 5px; margin:5px 5px 5px 0;" align="center">
            <h3 class="display-5">DOCUMENTO DE CONFIRMAÇÃO DE RESERVA</h3>
            <div>
                <h4>Código da Confirmação: {{$codigoConfirmacao}}</h4>

                <div style="margin-bottom:3px;"><b>Código da Solicitação:</b> {{$codigoSolicitacao}}</div>

                <div style="margin-bottom:3px;"><b>Código da Tarifa Acordo:</b> Não Há</div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div style="border:1px solid #CCC; padding:5px; margin:5px 5px 5px 0;">
                <h4 style="border-bottom: solid 1px #CCC; text-transform:uppercase; margin-top:3px;">Grupo Reservado</h4>
                <ul style="margin:5px 0 5px 0; padding:0; list-style:none;">

                    <li style="margin:0 0 5px 0;"><b>Grupo:</b> {{$classificacao->tipo}}</li>

                    <li style="margin:0 0 5px 0;"><b>Veículo:</b> {{$carro->nome}}</li>

                    <li style="margin:0 0 5px 0;"><b>Características do Carro:</b> <br/>
                        <ul>
                            @foreach($acessorios as $value)
                                <li>{{$value->nome}}</li>
                            @endforeach
                        </ul></li>

                </ul>
            </div>
        </div>
        <div class="col">
            <div style="border:1px solid #CCC; padding:5px; margin:5px 5px 5px 0;">
                <h4 style="border-bottom: solid 1px #CCC; text-transform:uppercase; margin-top:3px;">Valores da Reserva</h4>
                <ul style="list-style: none">
                    <li height="20">Quilometragem:</li>
                    <ul>
                        <li>Km Livre</li>
                    </ul>
                    <li height="20">Total de Diárias:</li>
                    <ul>
                        <li>{{$dias}}</li>
                    </ul>
                    <li height="20">Limite de Horas Excedentes:</li>
                    <ul>
                        <li>6</li>
                    </ul>

                    <li height="20">Veículo:</li>
                    <ul>
                        <li>R${{$valorCarro}}</li>
                    </ul>

                    <li height="20">Proteção:</li>
                    <ul>
                        <li>R$0,00 (incluso no pacote)</li>
                    </ul>

                    <li height="20">Taxa Excedente Proteção:</li>
                    <ul>
                        <li>R$0,00</li>
                    </ul>

                    <li height="20">Valor Total da Reserva:</li>
                    <ul>
                        <li>R${{$valorCarro * $dias}}</li>
                    </ul>
                </ul>

                </div>
            </div>
        </div>

                <div style="border:1px solid #CCC; padding:5px; margin:5px 5px 5px 0;">
                    <h3 style="border-bottom: solid 1px #CCC; text-transform:uppercase; margin-top:3px;">Documentos Necessários</h3>

                    <div style="margin:5px 0 5px 0; padding:0; list-style:none;">&#8226; Documento CPF/Passaporte <br/>
                        &#8226; Carteira de Habilitação <br/>
                        &#8226; Cartão de Crédito <br/>
                        &#8226; Via Impressa da Confirmação</div>
                </div>


                <div style="border:1px solid #CCC; padding:5px; margin:5px 5px 5px 0;">
                    <h3 style="border-bottom: solid 1px #CCC; text-transform:uppercase; margin-top:3px;">Requisitos Básicos</h3>

                    <div style="margin:5px 0 5px 0; padding:0; list-style:none;">&#8226; Idade mínima 21 anos completo <br/>
                        &#8226; 2 anos de habilitação definitiva <br/>
                        &#8226; Cartão de crédito para caução <br/>
                        &#8226; Sem restrições no SPC/Serasa</div>
                </div>



                <div style="border:1px solid #CCC; padding:5px; margin:5px 5px 5px 0;">
                    <h3 style="border-bottom: solid 1px #CCC; text-transform:uppercase; margin-top:3px;">Fale Conosco</h3>
                    <ul style="margin:15px 0 5px 0; padding:0; list-style:none;">
                        <li style="margin:0 0 5px 0;"><b>Central de Atendimento ao Cliente</b> <br/>
                            &#8226; Capitais: 4002 8922 <br/>
                            &#8226; Outras Localidades: 0800 400 2892 <br/>
                            &#8226; Internacional: +55 (11) 4002 8922<br/>
                            <p></p>
                            Horários de Funcionamento <br/>
                            &#8226; Segunda à Sexta: 07:00h às 22:00h <br/>
                            &#8226; Sábados: 08:00h às 22:00h <br/>
                            &#8226; Domingos e Feriados: 10:00h às 22:00h</li>
                    </ul>
                </div>
                <div style="border:1px solid #CCC; padding:5px; margin:5px 0 5px 5px;">
                    <h3 style="border-bottom: solid 1px #CCC; text-transform:uppercase; margin-top:3px;">Locatário</h3>
                    <ul style="margin:5px 0 5px 0; padding:0; list-style:none;">

                        <li><b >Nome:</b> {{$nome}}</li>

                        <li ><b >Celular:</b> {{$telefone}}</li>

                        <li><b >E-Mail:</b> {{$email}}</li>

                    </ul>
                </div>



                <div style="border:1px solid #CCC; padding:5px; margin:5px 0 5px 5px;">
                    <h3 style="border-bottom: solid 1px #CCC; text-transform:uppercase; margin-top:3px;">Local de Retirada</h3>
                    <ul style="margin:5px 0 5px 0; padding:0; list-style:none;">

                        <li style="margin:0 0 5px 0;"><b>Data da Retirada:</b> {{$dataRet}} à partir das 10:00h</li>

                        <li style="margin:0 0 5px 0;"><b>Local:</b> {{$localRet}}</li>

                        <li style="margin:0 0 5px 0;"><b>Balcão de Atendimento:</b> O balcão de atendimento da locadora está localizado na entrada do locao, onde você será orientado sobre a abertura do contrato de locação e retirada do veículo.</li>

                        <li style="margin:0 0 5px 0;"><b>Importante:</b> Para fins de pagamento e bloqueio caução, a locadora exige que o cartão de crédito seja vinculado a instituição bancária.</li>

                        <li style="margin:0 0 5px 0;"><b>Endereço:</b> {{$enderecoRet}}</li>

                        <li style="margin:0 0 5px 0;"><b>Telefone:</b> (11) {{$telefoneRet}}</li>

                        <li style="margin:0 0 5px 0;"><b><span style="color:red">Atenção</span>:</b> Caso tenha algum imprevisto, comunique imediatamente à loja de retirada do veículo através do telefone presente no documento de confirmação de reserva. Em caso de dificuldades, entre em contato com a central de reservas para que seja verificada a possibilidade de atualização do horário de retirada do veiculo.</li>

                    </ul>
                </div>



                <div style="border:1px solid #CCC; padding:5px; margin:5px 0 5px 5px;">
                    <h3 style="border-bottom: solid 1px #CCC; text-transform:uppercase; margin-top:3px;">Local de Devolução</h3>
                    <ul style="margin:5px 0 5px 0; padding:0; list-style:none;">

                        <li style="margin:0 0 5px 0;"><b>Data da Devolução:</b> {{$dataDev}} até as 22:00h</li>

                        <li style="margin:0 0 5px 0;"><b>Local:</b> {{$localDev}}</li>

                        <li style="margin:0 0 5px 0;"><b>Balcão de Atendimento:</b> Você será transportado da loja de atendimento até o setor de devolução por um funcionário da locadora.</li>

                        <li style="margin:0 0 5px 0;"><b>Importante:</b> Para fins de pagamento e bloqueio caução, a locadora Movida exige que o cartão de crédito seja vinculado a instituição bancária.</li>

                        <li style="margin:0 0 5px 0;"><b>Endereço:</b> {{$enderecoDev}}</li>

                        <li style="margin:0 0 5px 0;"><b>Telefone:</b> (11) {{$telefoneDev}}</li>

                        <li style="margin:0 0 5px 0;"><b><span style="color:red">Atenção</span>:</b> Caso tenha algum imprevisto, comunique imediatamente a loja de devolução do veículo através do telefone presente no documento de confirmação de reserva. Em caso de dificuldades, entre em contato com a central de reservas para que seja verificada a possibilidade de atualização do horário de devolução do veiculo.</li>

                    </ul>
                </div>



                <div style="border:1px solid #CCC; padding:5px; margin:5px 0 5px 5px;">
                    <h3 style="border-bottom: solid 1px #CCC; text-transform:uppercase; margin-top:3px;">Incluso em sua Reserva</h3>
                    <p style="color: #b00; font-size: 16px;"></p>
                    <ul style="margin:5px 0 5px 0; padding:0; list-style:none;">

                        <li style="margin:0 0 5px 0;"><b>Proteção do Veículo:</b> Proteção contra roubo, furto, perda, danos e avarias ao veículo decorrente de colisões ou acidentes. Limites de cobertura e valor da coparticipação na franquia estabelecidos em contrato de locação.</li>

                        <li style="margin:0 0 5px 0;"><b>Itens Sem Cobertura:</b> As proteções não possuem cobertura para danos em pneus, rádio/CD Player, vidros, pára-brisa, estofamento, acessórios, riscos no veículo, mau uso e atos de vandalismo, cuja responsabilidade é do locatário. Danos causados por uso de adesivos e excesso de carga que danifiquem o veículo ou conduzí-lo em estradas não permitidas e sem condições também não serão cobertos pelos seguros.</li>

                        <li style="margin:0 0 5px 0;"><b>Taxas Administrativas.</b></li>
                    </ul>
                </div>


                <!--
                <div style="border:1px solid #CCC; padding:5px; margin:5px 0 5px 5px;">
                    <h3 style="border-bottom: solid 1px #CCC; text-transform:uppercase; margin-top:3px;"></h3>
                    <ul style="margin:5px 0 5px 0; padding:0; list-style:none;">

                        <li style="margin:0 0 5px 0;"><b>:</b> </li>

                    </ul>
                </div>
                -->




                <div style="border:1px solid #CCC; padding:5px; margin:5px 0 5px 5px;">
                    <h3 style="border-bottom: solid 1px #CCC; text-transform:uppercase; margin-top:3px;">Condição de Pagamento</h3>
                    <ul style="margin:5px 0 5px 0; padding:0; list-style:none;">

                        <li style="margin:0 0 5px 0;"><b>Tipo de Pagamento:</b> O Locatário realizará o pagamento total dos serviços no destino, direto com a Locadora no dia da retirada do veículo. Atenção: O valor da sua reserva poderá sofrer alteração de acordo com a variação cambial e com a moeda local.</li>

                        <li style="margin:0 0 5px 0;"><b>Forma de Pagamento:</b> Cartão de Crédito. É obrigatória a apresentação de cartão de crédito válido, emitido por instituição bancária e de titularidade do Locatário. A aprovação do cartão de crédito é de única e exclusiva responsabilidade da Locadora. O cartão de crédito deverá possuir limite mínimo de crédito disponível exigido pela Locadora para pré-autorização de débito, que tem por finalidade cobrir eventuais danos ou avarias que o veículo possa sofrer durante a locação, infrações de trânsito ocorridas durante o período de locação e custos adicionais de serviços contratados diretamente com a Locadora e não descritos neste documento. Não serão aceitos cartões de crédito pré-pagos.</li>

                        <li style="margin:0 0 5px 0;"><b>Valor Caução:</b> a partir de R$700,00 (mínimo) ou valor total da locação (prevalece a maior quantia).</li>

                        <li style="margin:0 0 5px 0;"><b>Franquia:</b> Limites de cobertura e valor da coparticipação na franquia estabelecidos em contrato de locação.</li>

                    </ul>
                </div>



                <div style="border:1px solid #CCC; padding:5px; margin:5px 0 5px 5px;">
                    <h3 style="border-bottom: solid 1px #CCC; text-transform:uppercase; margin-top:3px; color: #b00;">
                        Atenção</h3>
                    <div style="margin:5px 0 5px 0; padding:0; list-style:none;">A Locadora poderá oferecer ao Locatário serviços adicionais não inclusos e descritos em sua reserva. Ao aceitar esses serviços o Locatário assumirá total responsabilidade sobre a contratação e pagamento do mesmo junto à Locadora. Recomendamos que leia com atenção o contrato de locação e a discriminação dos serviços e valores antes de assiná-lo.<br><br>Esta tarifa é exclusiva para clientes com o país de residência: <strong>Brasil</strong>.<br>Clientes com país de residência diferente estão sujeitos às restrições da locadora e podem ter problemas na retirada do veículo, incluindo o cancelamento da reserva. Confira as condições de cancelamento e alteração abaixo.</div>
                </div>


                <div style="border:1px solid #CCC; padding:5px; margin:5px 0;">
                    <h3 style="border-bottom: solid 1px #CCC; text-transform:uppercase; margin-top:3px;">Orientações Gerais de Locação</h3>
                    <div style="margin-bottom:10px;">
                        <ol style="padding:2px 5px; margin: 0px 0px 0px 15px;">

                            <li style="margin:5px 0 5px 0; padding:0;">Os itens abaixo detalhados são meramente informativos e representam o conjunto de informações, regras e obrigações usualmente exigidas pelas locadoras. </li>

                            <li style="margin:5px 0 5px 0; padding:0;">Cada locadora tem particularidades no contrato, razão pela qual é importante uma atenta leitura antes da assinatura no ato da abertura do contrato.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">A LocadoraDAHORA não se responsabiliza em caso de eventuais mudanças e/ou novas exigências das locadoras que podem ocorrer sem prévio aviso. Quaisquer dúvidas a respeito desses procedimentos e exigências devem ser dirimidas previamente, pois podem impossibilitar a efetivação da locação do veículo.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Contrato de Locação: o contrato de locação representa o conjunto de informações, regras, direitos e deveres entre locadora e locatário, no que diz respeito aos serviços a serem contratados. O contrato será apresentado pela locadora ao locatário no dia da retirada do veículo, sendo de responsabilidade do mesmo a devida leitura de suas cláusulas.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Idade Mínima do Locatário/Condutor: 21 anos. Condutores com idade inferior a 21 anos, que possuem carteira de habilitação definitiva, bem como condutores com idade superior a 70 anos estão sujeitos a taxas adicionais por parte das locadoras.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Carteira de Habilitação: o locatário deverá apresentar à locadora o documento original de habilitação brasileira, válida durante todo o período de locação e emitida há pelo menos dois anos. Para locatários não brasileiros, estes deverão apresentar o documento original de habilitação internacional juntamente com a carteira de habilitação do país de sua nacionalidade.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">CPF ou Passaporte: o locatário deverá apresentar à locadora o documento CPF original para abertura do contrato de locação. Para locatários não brasileiros, estes deverão apresentar o documento passaporte original e válido do país de sua nacionalidade.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Restrições: a locadora poderá realizar consultas com os dados do locatários e do(s) condutor(es) adicional(ais) em seu cadastro interno bem como em órgãos de proteção ao crédito. Na existência de pendências ou observações vinculadas aos registros, a locadora poderá cancelar a reserva sem prévio aviso e/ou negar a abertura do contrato de locação, impossibilitando a retirada do veículo. Em casos de reservas pagas antecipadamente, o locatário não estará isento da análise de crédito e cadastro realizada pela locadora. Informamos que a nossa Central de Reservas, não faz nenhuma consulta prévia, para realizar a confirmação de sua solicitação de reserva.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Cartão de Crédito para Bloqueio Caução: para locatários brasileiros utilizando locações no Brasil, é necessária a apresentação de um cartão de crédito válido de sua titularidade, com vínculo bancário e com limite disponível para bloqueio caução. Em caso de locatários de outras nacionalidades,exige-se a apresentação de cartão internacional sob as mesmas condições especificadas acima. Não serão aceitos cartões de crédito de terceiros, pré-pagos ou não autorizados para realizar as transações previamente especificadas. A aceitação do cartão de crédito é de único e exclusivo critério da locadora no ato da abertura do contrato de locação. O valor caução possui variação de acordo com o grupo de veículo locado, período de utilização e poderá ser retido pela locadora em caso de avarias ao veículo locado ou para pagamento de serviços opcionais contratados diretamente no balcão da locadora.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Documento de Confirmação de Reserva: o locatário deverá apresentar à locadora o documento de confirmação de reserva impresso e legível, o qual representa a garantia de reserva do veículo junto à locadora.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Dados antecipados para a locadora: informações complementares do locatário, assim como o pagamento antecipado do valor total ou parcial dos serviços contratados, poderão ser solicitadas com antecedência pela locadora por telefone ou e-mail. O não fornecimento das informações solicitadas ou o insucesso no contato entre a locadora com o locatário poderá ocasionar o cancelamento da reserva pela locadora sem prévio aviso.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Moeda: os valores da reserva são expressos na moeda local do país de destino, Real Brasileiro (BRL).</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Valor Caução de Garantia: o valor caução exigido pela locadora será bloqueado no cartão de crédito do locatário no dia da abertura do contrato. O desbloqueio será solicitado pela locadora à administradora do cartão no momento da devolução do veículo e o prazo para efetivação do desbloqueio dependerá da administradora do cartão de crédito. O valor caução possui variação de tarifa de acordo com o grupo do veículo locado e período de utilização. O valor caução poderá ser retido pela locadora em casos de avarias no veículo locado.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Pagamento dos Serviços: a cobrança do valor total dos serviços contratados poderá ser solicitada pela locadora no dia da abertura ou fechamento do contrato de locação. A locadora poderá solicitar ao locatário a antecipação dos dados de cartão de crédito e pagamento antecipado de sinal para garantia da reserva.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Pagamento Parcelado em Cartão de Crédito: o locatário deverá solicitar o pagamento parcelado dos serviços contratados no dia da retirada do veículo. A disponibilidade do parcelamento sem juros em cartão de crédito e o número limite de parcelas será confirmada no balcão de atendimento da locadora e estará sujeito a alterações sem prévio aviso.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Prazo para Retirada do Veículo: a locadora permanecerá com a reserva do veículo garantida até 30 minutos após o horário previsto para retirada ou até o horário limite de funcionamento da loja de retirada, o que for menor. Após este prazo a reserva será cancelada em sistema (No-Show). Em caso de atraso de qualquer natureza, incluído atraso aéreo, substituição de voo ou overbooking aéreo para aqueles que retiram o veículo em aeroporto, comunique imediatamente a loja de retirada do veículo através do telefone presente no documento de confirmação de reserva. Em caso de dificuldades, entre em contato com a Central de Reservas LocadoraDAHORA para que seja verificada a possibilidade de atualização do horário de retirada do veículo.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Período de Utilização: O locatário deverá realizar a retirada e devolução do veículo em data, horário e local determinados no documento de confirmação de reserva, caso os dados especificados na reserva não sejam cumpridos a locadora se resguardar o direito de reajustar o valor final da reserva, podendo incorrer em cobrança de multas e/ou taxas adicionais com base no valor de tabela balcão.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Devolução Antecipada do Veículo: na prorrogação ou redução do período de permanência com o veículo locado o valor final da reserva poderá ser reajustado pela  Locadora, podendo a tarifa sofrer redução ou acréscimo de forma não-proporcional em função das condições exclusivas oferecidas no prazo  de locação pré-acordado.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Horários de Funcionamento da loja: os horários de funcionamento da loja poderão sofrer mudanças sem prévio aviso. Em caso de retirada ou devolução em data, horário e local diferentes do determinado em contrato de locação, é de responsabilidade do locatário verificar a disponibilidade junto à locadora ou nossa Central de Reservas.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Serviço de Entrega ou Shuttle: o locatário deverá apresentar antecipadamente o número do voo e companhia aérea do desembarque para os serviços de atendimento à distância, realizado por locadora localizada fora da área aeroportuária. O não fornecimento das informações poderá resultar no cancelamento da reserva pela locadora sem prévio aviso.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Serviços e Acessórios Opcionais: o locatário poderá solicitar os opcionais de locação de acordo com sua necessidade diretamente à locadora no dia da retirada do veículo. Orientamos realizar a vistoria das condições dos opcionais contratados e na discordância, notifique imediatamente a locadora.  Condutores adicionais estarão sujeitos às mesmas regras do locatário e deverão estar presentes no ato da abertura do contrato de locação.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Grupo de Veículos: os veículos são reservados por GRUPO e não serão garantidos em reserva veículos por marca, ano, modelo, cor, final de placa ou configuração. Os modelos poderão sofrer variações na renovação de frota da locadora sem prévio aviso, assim como a capacidade de bagagem do veículo poderá ser reduzida ou inexistente de acordo com o número de ocupantes do veículo. O upgrade de categoria poderá ser apresentado pela locadora quando esta não apresentar disponibilidade de veículos do grupo reservado.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Taxa de Retorno: a taxa de retorno, prevista para as locações onde a devolução do veículo não ocorre na loja onde foi realizada a retirada, é calculada com base na distância entre as lojas e multiplicada pelo custo médio/hora de transporte do veículo à loja de origem. A Taxa de Retorno possui variação de valores de acordo com as condições de cada locadora.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Tarifa Regional: para algumas localidades, onde a depreciação dos veículos é maior, será adicionada a cobrança de tarifa regional, o valor da tarifa varia entre 5% a 30% sobre o valor total dos serviços contratados.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Despesas Extras: despesas extras não apresentadas no documento de confirmação de reserva serão cobradas pela locadora diretamente ao locatário no cartão de crédito utilizado para a pré-autorização de débito. Exemplos de despesas extras: multas de trânsito, danos ou avarias causados ao veículo locado e sem cobertura, taxa de limpeza, serviços e acessórios contratados diretamente na locadora.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Proibido fumar: é proibido fumar dentro do veículo locado.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Atualização de Valores: os valores da reserva possuem como referência as informações contidas na solicitação do locatário. Os valores poderão sofrer alterações quando: a) Ocorrer mudanças de itinerário, grupos, serviços e informações da reserva; b) Inclusão ou exclusão de serviços e acessórios opcionais; c) Inclusão de taxas adicionais apresentados pela locadora e não calculados na emissão da reserva ou não apresentadas no documento de confirmação de reserva; d) Na discordância dos valores recalculados e apresentados em documento contratual o locatário poderá solicitar o cancelamento da reserva.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">A locadora poderá não autorizar a abertura do contrato de locação caso a utilização da mesma seja para fins comerciais, tal como utilização para Uber, entregas, transporte de cargas e similares.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Vistoria do Veículo: recomendamos ao locatário acompanhar a vistoria no ato da retirada e devolução. É importante verificar e apontar as condições de limpeza, higiene, conservação, danos e/ou avarias existentes no veículo locado. A locadora poderá realizar a cobrança de manutenção das avarias causadas ao veículo em sua locação, assim como a taxa de limpeza e higienização com base na tabela de valores da locadora.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Documentos do Veículo e Itens de Segurança: confira no ato da retirada do veículo a documentação do automóvel e a existência dos acessórios de segurança: pneu estepe, macaco, chave de roda, triângulo de sinalização e nível do tanque de combustível.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Combustível e Reabastecimento: o veículo será entregue ao locatário com combustível (normalmente com tanque cheio) e deverá ser devolvido nas mesmas condições em que for retirado. Em caso de não reabastecimento aos mesmos níveis originais, haverá a cobrança do reabastecimento proporcional com base na tabela de preços da locadora. A isenção do reabastecimento do veículo será aplicada quando esta condição estiver incluída no plano de tarifa contratado ou quando houver adesão no balcão. Orientamos que solicite o comprovante do abastecimento realizado imediatamente antes da entrega do veículo, num raio de 5km do local de entrega, para facilitar a contestação de qualquer divergência relacionada.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Itens sem Cobertura de Risco / Proteção Obrigatória: o locatário estará sujeito às cláusulas presentes no contrato de locação da locadora. Como regra geral, a cobertura exclui, entre outros, os seguintes itens: acessórios, pneu danificado, roda danificada, suspensão danificada devido a buracos ou guias, trincos no para-brisa, danos causados por enchentes ou qualquer outro fenômeno da natureza, perda ou danificação da chave e/ou documentação do veículo. Tais itens podem variar entre as locadoras e deverão ser confirmados no ato da retirada do veículo. Verifique cuidadosamente os detalhes da proteção e cobertura disponíveis em sua reserva. Havendo interesse pela contratação de proteções disponíveis, ou na discordância das condições apresentadas, o locatário deverá contatar nossa Central de Reservas LocadoraDAHORA. A LocadoraDAHORA não se responsabiliza pela perda da proteção do veículo decorrente do mesmo ser conduzido por pessoas não autorizadas, sob influência de álcool/ drogas ou em desrespeito à legislação de trânsito vigente.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Valores de Co-participação e/ou franquia: Quando aplicados, os valores e taxas de co-participação e/ou franquia serão determinados em contrato de locação e, em caso de avarias ou danos ocasionados ao veículo, a cobrança será realizada diretamente pela locadora ao locatário. Além de tais custos, a locadora também poderá cobrar pelo período em que o veículo ficou parado para manutenção. Certifique-se de tais cobranças no momento da abertura do contrato de locação.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Saída do País com o Veículo Locado: é proibida a circulação com o veículo locado para fora do território Nacional.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Acidentes de Trânsito: em caso de acidente, furto ou dano ao veículo locado, é imprescindível que o locatário comunique imediatamente a locadora e realize o Boletim de Ocorrência Policial. O locatário deverá preencher o formulário de relatório de acidentes junto à locadora no prazo de 24 horas.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Titularidade da Reserva: o documento de confirmação de reserva é individual e intransferível.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Duplicidade de reservas: A locadora poderá limitar a abertura de mais de um contrato de locação em nome do mesmo Locatário para o mesmo período. Portanto, havendo necessidade de duas reservas em nome de apenas uma pessoa responsável, recomendamos a entrar em contato com a Central de Reservas LocadoraDAHORA para mais orientações.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Alterações da Reserva: a solicitação de alteração nos dados da reserva estará sujeita a reanálise de disponibilidade de veículos do grupo e atualização de valores com base na tabela vigente de tarifas e descontos da locadora.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Cancelamento: O locatário deverá contatar a Rentcars para solicitar o cancelamento da reserva com antecedência ao horário previsto para retirada do veículo. Após o cancelamento a reserva não poderá ser utilizada. A Rentcars realizará a cobrança de taxa de cancelamento equivalente a 5% do valor total pré-pago. Para cancelamentos realizados pela locadora devido ao não preenchimento dos requisitos necessários para a abertura do contrato (idade mínima requerida, carteira de habilitação válida e aceitável no país de destino, passaporte válido, cartão de crédito internacional com limite disponível para caução, apresentação do Documento de Confirmação de Reserva impresso, etc.) e/ou não utilização da reserva por outra razão será cobrado o valor integral de 1 (uma) diária. Para reservas com apenas 1 (uma) diária, a retenção do valor pré-pago ocorre de forma integral. Quando o locatário não comparecer para a retirada veículo junto à locadora (No-Show) de acordo com datas e horários estabelecidos no Documento de Confirmação de Reserva, será cobrado o valor integral de 1 (uma) diária. Para reservas com apenas 1 (uma) diária, a retenção do valor pré-pago ocorre de forma integral. Para reservas junto a Locadora Keddy By Europcar, a taxa de No-Show será estabelecida no valor mínimo de €100.00.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">No-Show: a locadora poderá realizar a cobrança e débito de No-Show diretamente ao locatário, caso este não compareça à locadora para abertura do contrato de locação e retirada do veículo ou não realize o comunicado de cancelamento da referida reserva no prazo mínimo de 48 horas de antecedência ao horário de retirada do veículo.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Indisponibilidade de Veículos: a LocadoraDAHORA não se responsabiliza pelo não cumprimento das obrigações da locadora quanto à indisponibilidade de veículos para atendimento. É de responsabilidade do locatário comunicar a nossa Central de Reservas sobre quaisquer dificuldades apresentadas junto à locadora na abertura do contrato de locação ou retirada do veículo. A LocadoraDAHORA não poderá ser responsabilizada por quaisquer perdas, danos, alterações, cancelamentos e atrasos decorrentes de força maior incluindo companhias aéreas, conflitos civis, desastres naturais e outros.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Não Preenchimento dos Requisitos de Locação: a locadora poderá recusar o atendimento no ato da abertura do contrato, a qualquer pessoa que não cumprir com os requisitos de locação estabelecidos por ela ou que seja considerada incapaz de conduzir o veículo.</li>

                            <li style="margin:5px 0 5px 0; padding:0;">Restrições de Fronteira: As locadoras reservam-se ao direito de aplicar taxas sobre o cruzamento de fronteiras entre estados ou países, além disso, podem também restringir tal atividade. Cabe ao locatário informar previamente a locadora do veículo sobre o seu itinerário.</li>

                        </ol>
                    </div>
                </div>
</div>
</body>
</html>
