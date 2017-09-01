/**
 * Created by javier on 27/08/17.
 */
function Fecha() {

    this.fechaPrestamo = '',

    this.init = function (){
        this.fechaPrestamo = new Date();
    },

    this.setFecha = function (year, month, date) {
        month--;
        this.fechaPrestamo = new Date(year, month, date);
    },

    this.setFullFecha = function (fecha){
        year = parseInt(fecha.substr(0,4));
        month = parseInt(fecha.substr(5,2)) -1;
        date = parseInt(fecha.substr(8,2));

        this.fechaPrestamo = new Date(year, month, date);
    },

    this.getFecha = function () {
        return  this.fechaPrestamo;
    },

    this.setDate = function (date) {
        this.fechaPrestamo.setDate(date);
    },

    this.setMonth = function(month){
        month--;
        this.fechaPrestamo.setMonth(month);
    },

     this.addDate = function(date){
         this.fechaPrestamo.setDate( this.fechaPrestamo.getDate() + date);
    },

     this.addMonth = function (month) {
         this.fechaPrestamo.setMonth( this.fechaPrestamo.getMonth() + month);
    },

     this.addYear = function (year) {
         this.fechaPrestamo.setFullYear( this.fechaPrestamo.getFullYear() + year);
    },

     this.getDate = function(){
        date =  this.getFormatoDia(fechaPrestamo.getDate());
        return date;
    },

    this.getMonth = function(){
        month = fechaPrestamo.getMonth() + 1;
        monthFormat =  this.getFormatoMes(month);
        return monthFormat;
    },

     this.getFullYear = function () {
        return  this.fechaPrestamo.getFullYear();
    },

     this.getFormatoFecha = function () {
        anio =  this.fechaPrestamo.getFullYear();
        month =  this.fechaPrestamo.getMonth() + 1;
        monthFormat =  this.getFormatoMes(month);
        date =  this.fechaPrestamo.getDate();
        dateFormat =  this.getFormatoDia(date);

        return anio + "-" + monthFormat + "-" + dateFormat;
    },

     this.getTime = function () {
        return  this.fechaPrestamo.getTime();
    },

    this.getDiferenciaDias = function(fechaDiff){
        var timeDiff =  this.getTime() - fechaDiff;
        var diasDiff = Math.floor(timeDiff/(1000*24*60*60));

        return diasDiff;
    },

     this.getFormatoMes = function(mes){
        if(mes < 10){
            mes = 0 + "" + mes;
        }

            return mes;
    },

     this.getFormatoDia = function (dia) {
        if(dia < 10){
            dia = 0 + "" + dia;
        }

        return dia;
    },

    this.compararFechaMenor = function(fecha){
        if(this.fechaPrestamo.getFormatoFecha() < fecha){
            return true
        }

        return false;
    },

    this.compararFechaMayor = function(fecha){
        if(this.getFormatoFecha() > fecha){
            return true
        }

        return false;
    }

}