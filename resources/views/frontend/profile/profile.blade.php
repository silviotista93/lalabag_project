@extends('frontend.layout')
@section('content')
    <div class="breadcrumb-area bg-color ptb--90" data-bg-color="#f6f6f6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center flex-sm-row flex-column">
                        <h1 class="page-title">Bienvenido</h1>
                        <ul class="breadcrumb">
                            <li><a href="/">Inicio</a></li>
                            <li class="current"><span>Mi Cuenta</span></li>
                        </ul>
                    </div>
                    <div class="pull-right">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input type="submit" value="Cerra Sesión" class="btn btn-submit btn-style-1">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content-wrapper">
        <div class="page-content-inner ptb--80">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="user-dashboard-tab flex-column flex-md-row">
                            <div class="user-dashboard-tab__head nav flex-md-column" role="tablist"
                                 aria-orientation="vertical">
                                <a class="nav-link active" data-toggle="pill" role="tab" href="#dashboard"
                                   aria-controls="dashboard" aria-selected="true">Dashboard</a>
                                <a class="nav-link" data-toggle="pill" role="tab" href="#orders" aria-controls="orders"
                                   aria-selected="true">Órdenes</a>
                                <a class="nav-link" data-toggle="pill" role="tab" href="#encuesta"
                                   aria-controls="encuesta" aria-selected="true">Encuesta</a>
                                <a class="nav-link" data-toggle="pill" role="tab" href="#addresses"
                                   aria-controls="addresses" aria-selected="true">Addresses</a>
                                <a class="nav-link" data-toggle="pill" role="tab" href="#accountdetails"
                                   aria-controls="accountdetails" aria-selected="true">Account Details</a>
                            </div>
                            <div class="user-dashboard-tab__content tab-content">
                                <div class="tab-pane fade show active" id="dashboard">
                                    <p>Hola <strong>{{ auth()->user()->name }}</strong></p>
                                    <p>Desde el panel de su cuenta. puede revisar y ver fácilmente sus pedidos
                                        recientes, administrar sus direcciones de envío y facturación y editar su
                                        contraseña y los detalles de la cuenta.</p>
                                </div>
                                <div class="tab-pane fade" id="orders">
                                    <div class="message-box mb--30 d-none">
                                        <p><i class="fa fa-check-circle"></i>No order has been made yet.</p>
                                        <a href="shop-sidebar.html">Go Shop</a>
                                    </div>
                                    <div class="table-content table-responsive">
                                        <table class="table text-center">
                                            <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="wide-column">September 19, 2018</td>
                                                <td>Processing</td>
                                                <td class="wide-column">$49.00 for 1 item</td>
                                                <td><a href="product-details.html"
                                                       class="btn btn-small btn-bg-red btn-color-white btn-hover-2">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td class="wide-column">September 19, 2018</td>
                                                <td>Processing</td>
                                                <td class="wide-column">$49.00 for 1 item</td>
                                                <td><a href="product-details.html"
                                                       class="btn btn-small btn-bg-red btn-color-white btn-hover-2">View</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="encuesta">
                                    <p>A través de tu encuesta conoceremos tus preferencias, así nos guiamos para
                                        enviarte solamente productos con los que te identifiques, también adecuamos todo
                                        al tono de tu piel y tipo de piel</p>
                                    <!--=====================================
		                                TAB DE ENCUESTA
                                    ======================================-->
                                    <div class="row">
                                        <div class="col-md-4 mb-sm--20 p-4">
                                            <div class="text-block">
                                                <h4 class="mb--20">Cuando es tu cumpleaños</h4>
                                                <input type="text" name="" id="datepicker" class="form__input">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-sm--20 p-4">
                                            <h4 class="mb--20">¿Que tipo de piel eres?</h4>
                                            <div class="product-ordering">
                                                <select class="product-ordering__select piel-select">
                                                    <option value="0">Grasa</option>
                                                    <option value="1">Seca</option>
                                                    <option value="2">Mixta</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-sm--20 p-4">
                                            <h4 class="mb--20">¿Que color se acerca mas a tus cejas?</h4>
                                            <div class="product-ordering">
                                                <select class="product-ordering__select piel-select">
                                                    <option value="0">Rubio</option>
                                                    <option value="1">Negro</option>
                                                    <option value="2">Castaño Oscuro</option>
                                                    <option value="2">Castaño Claro</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-sm--20 p-4">
                                            <h4 class="mb--20">Según la imagen, ¿cual es tu color de piel?</h4>
                                            <div class="product-ordering">
                                                <select class="product-ordering__select piel-select">
                                                    <option value="0">Fair</option>
                                                    <option value="1">Ligth</option>
                                                    <option value="2">Medium</option>
                                                    <option value="2">Tan</option>
                                                    <option value="2">Rich</option>
                                                </select>
                                            </div>
                                           {{-- <figure>
                                                <img src="/frontend/img/encuesta/tipos_piel.jpg" alt="">
                                            </figure>--}}
                                        </div>
                                        <div class="col-md-4 mb-sm--20 p-4">
                                            <h4 class="mb--20">¿Nivel de conocimiento acerca de productos de
                                                belleza?</h4>
                                            <div class="product-ordering">
                                                <select class="product-ordering__select piel-select">
                                                    <option value="0">Solo lo basico</option>
                                                    <option value="1">Estoy aprendiendo</option>
                                                    <option value="2">Soy la maquilladora oficial de mis amigas</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-sm--20 p-4">
                                            <h4 class="mb--20">¿Sufres de alguna alergia?</h4>
                                            <textarea class="form__input form__input--2 form__input--textarea"
                                                      id="orderNotes" name="orderNotes"
                                                      placeholder="Si es asi, por favor cuentanos de que se trata"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-6 col-xs-6 mb-sm-- p-4">
                                            <h4 class="mb--20 text-center">¿Que tipo de productos te gustaria probar?</h4>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-6 col-xs-6 mb-sm--20 p-4">
                                                        <label class="containerLabel">Cuidado de Piel
                                                            <input type="checkbox">
                                                            <span class="checkmark containerCheck"></span>
                                                        </label>
                                                </div>
                                                <div class="col-md-3 col-sm-6 col-xs-6 mb-sm--20 p-4">
                                                    <label class="containerLabel">Cuidado de Piel
                                                        <input type="checkbox">
                                                        <span class="checkmark containerCheck"></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 col-sm-6 col-xs-6 mb-sm--20 p-4">
                                                    <label class="containerLabel">Cuidado de Piel
                                                        <input type="checkbox">
                                                        <span class="checkmark containerCheck"></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 col-sm-6 col-xs-6 mb-sm--20 p-4">
                                                    <label class="containerLabel">Cuidado de Piel
                                                        <input type="checkbox">
                                                        <span class="checkmark containerCheck"></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 col-sm-6 col-xs-6 mb-sm--20 p-4">
                                                    <label class="containerLabel">Cuidado de Piel
                                                        <input type="checkbox">
                                                        <span class="checkmark containerCheck"></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 col-sm-6 col-xs-6 mb-sm--20 p-4">
                                                    <label class="containerLabel">Cuidado de Piel
                                                        <input type="checkbox">
                                                        <span class="checkmark containerCheck"></span>
                                                    </label>
                                                </div>
                                                <div class="col-md-3 col-sm-6 col-xs-6 mb-sm--20 p-4">
                                                    <label class="containerLabel">Cuidado de Piel
                                                        <input type="checkbox">
                                                        <span class="checkmark containerCheck"></span>
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-sm--20 p-4">
                                            <h4 class="mb--20">¿Quien te refirió a LalaBag?</h4>
                                            <input type="text" name="billing_company" id="billing_company" class="form__input form__input--2">
                                        </div>
                                        <div class="col-md-6 mb-sm--20 p-4">
                                            <h4 class="mb--20">¿Tienes código de descuento??</h4>
                                            <input type="text" name="billing_company" id="billing_company" class="form__input form__input--2">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center mb-sm--20 p-4">
                                            <input type="submit" value="Enviar Encuesta"
                                                   class="btn btn-style-1 btn-submit">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="addresses">
                                    <p class="mb--20">The following addresses will be used on the checkout page by
                                        default.</p>
                                    <div class="row">
                                        <div class="col-md-6 mb-sm--20">
                                            <div class="text-block">
                                                <h4 class="mb--20">Billing address</h4>
                                                <a href="">Edit</a>
                                                <p>You have not set up this type of address yet.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-block">
                                                <h4 class="mb--20">Shopping address</h4>
                                                <a href="">Edit</a>
                                                <p>You have not set up this type of address yet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="accountdetails">
                                    <form action="#" class="form form--account">
                                        <div class="row grid-space-30 mb--20">
                                            <div class="col-md-6 mb-sm--20">
                                                <div class="form__group">
                                                    <label class="form__label form__label--2" for="f_name">First name
                                                        <span class="required">*</span></label>
                                                    <input type="text" name="f_name" id="f_name" class="form__input">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form__group">
                                                    <label class="form__label form__label--2" for="l_name">Last name
                                                        <span class="required">*</span></label>
                                                    <input type="text" name="l_name" id="l_name" class="form__input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb--20">
                                            <div class="col-12">
                                                <div class="form__group">
                                                    <label class="form__label form__label--2" for="d_name">Display name
                                                        <span class="required">*</span></label>
                                                    <input type="text" name="d_name" id="d_name" class="form__input">
                                                    <span class="suggestion"><em>This will be how your name will be displayed in the account section and in reviews</em></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb--20">
                                            <div class="col-12">
                                                <div class="form__group">
                                                    <label class="form__label form__label--2" for="email">Email Address
                                                        <span class="required">*</span></label>
                                                    <input type="email" name="email" id="email" class="form__input">
                                                </div>
                                            </div>
                                        </div>
                                        <fieldset class="form__fieldset mb--20">
                                            <legend class="form__legend">Password change</legend>
                                            <div class="row mb--20">
                                                <div class="col-12">
                                                    <div class="form__group">
                                                        <label class="form__label form__label--2" for="cur_pass">Current
                                                            password (leave blank to leave unchanged)</label>
                                                        <input type="password" name="cur_pass" id="cur_pass"
                                                               class="form__input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb--20">
                                                <div class="col-12">
                                                    <div class="form__group">
                                                        <label class="form__label form__label--2" for="new_pass">New
                                                            password (leave blank to leave unchanged)</label>
                                                        <input type="password" name="new_pass" id="new_pass"
                                                               class="form__input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form__group">
                                                        <label class="form__label form__label--2" for="conf_new_pass">Confirm
                                                            new password</label>
                                                        <input type="password" name="conf_new_pass" id="conf_new_pass"
                                                               class="form__input">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form__group">
                                                    <input type="submit" value="Save Changes"
                                                           class="btn btn-style-1 btn-submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $('#datepicker').datepicker({});
    </script>
@endsection