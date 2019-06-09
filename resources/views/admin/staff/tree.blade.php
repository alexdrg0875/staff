@extends('layouts/admin')

@section('styles')
    <style>
        .treeCSS,
        .treeCSS ul,
        .treeCSS li {
            margin: 0;
            padding: 0;
            line-height: 1;
            list-style: none;
        }
        .treeCSS ul {
            margin: 0 0 0 .5em;
        }
        .treeCSS > li:not(:only-child),
        .treeCSS li li {
            position: relative;
            padding: .2em 0 0 1.2em;
        }
        .treeCSS li:not(:last-child) {
            border-left: 1px solid #ccc;
        }
        .treeCSS li li:before,
        .treeCSS > li:not(:only-child):before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 1.1em;
            height: .7em;
            border-bottom: 1px solid #ccc;
        }
        .treeCSS li:last-child:before {
            width: calc(1.1em - 1px);
            border-left: 1px solid #ccc;
        }
        .treeCSS .drop {
            position: absolute;
            left: -.5em;
            top: .4em;
            width: .9em;
            height: .9em;
            line-height: .9em;
            text-align: center;
            background: #fff;
            font-size: 80%;
            cursor: pointer;
        }
        .treeCSS li:last-child > .drop {
            margin-left: 1px;
        }
        .treeCSS .drop + ul {
            display: none;
        }
        .treeCSS .dropM + ul {
            display: block;
        }
    </style>
@endsection

@section('content')
    <h2 class="bg-primary text-center">Staff hierarchy</h2>
    @include('admin.staff.tree_data')

@endsection

@section('scripts')
    <script>
        (function() {
            var ul = document.querySelectorAll('.treeCSS > li:not(:only-child) ul, .treeCSS ul ul');
            for (var i = 0; i < ul.length; i++) {
                var div = document.createElement('div');
                div.className = 'drop';
                div.innerHTML = '+';
                ul[i].parentNode.insertBefore(div, ul[i].previousSibling);
                div.onclick = function() {
                    this.innerHTML = (this.innerHTML == '+' ? '−' : '+');
                    this.className = (this.className == 'drop' ? 'drop dropM' : 'drop');
                }
            }
        })();

        function loadTree(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("id_"+id).innerHTML = this.responseText;
                    document.getElementById("id_"+id).id = "id_" + id;
                }
            };
            xhttp.open("GET", "/admin/staff/tree/"+id, true);
            xhttp.send();
            event.stopPropagation ? event.stopPropagation() : (event.cancelBubble=true);
        }
    </script>
@endsection

@section('footer')
@endsection