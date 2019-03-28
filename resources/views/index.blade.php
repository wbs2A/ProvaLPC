@extends('main' )

@section('content')
    <div id="index">
        <div id="banner" class="container-fluid">
            <search id="search"></search>
        </div>
        <!-- Area dos cards-->
        <section class="feature-area section-gap" id="service">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 pb-40 header-text">
                        <h1>Quais serviços oferecemos a nossos clientes?</h1>
                        <p>
                            Nós somos apaixonados por um sistema amigável!
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-feature">
                            <h4><span class="lnr lnr-user"></span>Experts Técnicos</h4>
                            <p>
                                O uso da Internet está se tornando mais comum devido ao rápido avanço da tecnologia e do poder.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-feature">
                            <h4><span class="lnr lnr-license"></span>Serviço Profissional</h4>
                            <p>
                                Nem é por fama, ou obrigação. É amor à profissão. Servimos bem para servir sempre.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-feature">
                            <h4><span class="lnr lnr-phone"></span>Suporte incrível</h4>
                            <p>
                                Melhor falar de caminhão do que falar da vida dos outros.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-feature">
                            <h4><span class="lnr lnr-rocket"></span>Habilidades técnicas</h4>
                            <p>
                                Eu só paro de engordar quando você parar de se preocupar com a minha vida.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-feature">
                            <h4><span class="lnr lnr-diamond"></span>Altamente recomendado</h4>
                            <p>
                                Não sou detetive, mas só ando na pista.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-feature">
                            <h4><span class="lnr lnr-bubble"></span>Avaliações positivas</h4>
                            <p>
                                A vida, como os dados, tem os pontos marcados.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop