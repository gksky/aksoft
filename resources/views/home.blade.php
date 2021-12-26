@extends('layouts.app')

@section('title')My test @endsection

@section('main')

<div id="app">
    <v-app>
      <v-main>
        <v-container>
<p>Написать приложение выполняющее расчет в задаче №3 (можно ли протолкнуть параллелепипед через прямоугольное отверстие) для произвольных a,b,x,y,z введенных пользователем через форму. Приложение должно на стороне сервера просчитать ответ и вернуть его в интерфейс через ajax.</p>

<p>В качестве бекэнда нужно использовать Laravel, в качестве фронта ограничений нет, но если получится сделать с использованием Vue, то будет плюсом.</p>
  <v-form>
<h2>Параметры прямоугольного отверстия:</h2>
<v-container>
      <v-row>
        <v-col
          cols="2"
        >
        <v-text-field
            v-model="dimentions.a"
            label="Сторона A"
            outlined
            dense
            type="number"
            step="1"
            @click="clearResult()"
          ></v-text-field>
        </v-col>

        <v-col
          cols="2"
        >
        <v-text-field
            v-model="dimentions.b"
            label="Сторона B"
            outlined
            dense
            type="number"
            step="1"
            @click="clearResult()"
          ></v-text-field>
        </v-col>


      </v-row>
      </v-container>
      <h2>Параметры прямого параллелепипеда:</h2>
      <v-container>
      <v-row>
        <v-col
          cols="2"
        >
        <v-text-field
            v-model="dimentions.x"
            label="Сторона X"
            outlined
            dense
            type="number"
            step="1"
            @click="clearResult()"
          ></v-text-field>
        </v-col>

        <v-col
          cols="2"
        >
        <v-text-field
            v-model="dimentions.y"
            label="Сторона Y"
            outlined
            dense
            type="number"
            step="1"
            @click="clearResult()"
          ></v-text-field>


        </v-col>
        <v-col
          cols="2"
        >
        <v-text-field
            v-model="dimentions.z"
            label="Сторона Z"
            outlined
            dense
            type="number"
            step="1"
            @click="clearResult()"
          ></v-text-field>


        </v-col>

      </v-row>
</v-container>
      <v-btn color="primary" @click="calculate()">Рассчитать</v-btn>

  </v-form>
<h2 id="result"></h2>
        </v-container>
      </v-main>
    </v-app>
  </div>

  <script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
      data: {
        dimentions: {a: 1, b: 2, x: 3, y: 4, z: 5,},
    },
    methods: {
        calculate(){
            axios.post('/calc', this.dimentions).then((response) => {document.getElementById('result').innerText = response.data}).catch((error) => {console.log(error)})
        },
        clearResult() {
            document.getElementById('result').innerText = '';
        }
    }
    })
  </script>

@endsection
