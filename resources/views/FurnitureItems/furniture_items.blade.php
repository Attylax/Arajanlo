@extends('layout.basic')
@section('pageTitle')
    Bútorok
@stop

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('css/furniture_items.css') }}"/>
@stop

@section('content')
    <div id="furniture_items">
        <div id="furniture_items_title_section">
            <img src="{{asset('Images/dummy_image.jpg')}}" style="width: 15em;height: 11em">
            <div id="furniture_items_desc">
                <h1>Butor Nev</h1>
                <p>Ar: 523 LEI</p>
                <p>Méretek: X:421 m | Y:659 m | Z:7 m</p>
            </div>
        </div>
        <div id="furniture_items_table">
            <h2>Fa alkoto-elemek</h2>
            <table>
                <tr>
                    <th scope="col" rowspan="2">Elem név</th>
                    <th scope="col" colspan="2">Faanyag</th>
                    <th scope="col" colspan="3">Méretek</th>
                    <th scope="col" colspan="2">Felületkezelés</th>
                    <th scope="col" rowspan="2">Mennyiség</th>
                    <th scope="col" rowspan="2">Ár</th>
                    <th scope="col" rowspan="2">Művelet</th>

                </tr>
                <tr>
                    <th>Név</th>
                    <th>Típus</th>
                    <th>X</th>
                    <th>Y</th>
                    <th>Y</th>
                    <th>Megnevezés</th>
                    <th>Oldalak</th>
                </tr>


                <?php
                for ($i = 0; $i < 10; ++$i) {
                    echo "<tr>
                    <td>Dummy Dummy Data</td>
                    <td>Dummy Data</td>
                    <td>Dummy Data</td>
                    <td>12354 m</td>
                    <td>12354 m</td>
                    <td>12354 m</td>
                    <td>Dummy Data</td>
                    <td>Dummy Data</td>
                    <td>Dummy Data</td>
                    <td>Dummy Data</td>
                    <td>Dummy Dummy Data</td>
                </tr>";
                }
                ?>


            </table>
            <h2>Egyeb alkoto-elemek</h2>
            <table id="other_items_table">
                <tr>
                    <th>Név</th>
                    <th>Mennyiség</th>
                    <th>Művelet</th>
                </tr>

                <?php
                for ($i = 0; $i < 10; ++$i) {
                    echo "<tr>
                    <td>Dummy Dummy Data</td>
                    <td>Dummy Data</td>
                    <td>Dummy Data</td>
                    </tr>";
                }
                ?>

            </table>

        </div>


    </div>
@stop