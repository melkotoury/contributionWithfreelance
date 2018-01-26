// Recibe el 'id' del elemento HTML para proceder a la validaciÃ³n, si es correcta devuelve 'true' y sino saca un alert y devuelve 'false'
//Requiere del framework jQuery
function valida_nif_cif_nie(a) {
    var resul = true;
    var temp = a.toUpperCase();
    var cadenadni = "TRWAGMYFPDXBNJZSQVHLCKE";
    if (temp !== '') {
        //algoritmo para comprobacion de codigos tipo CIF
        suma = parseInt(temp[2]) + parseInt(temp[4]) + parseInt(temp[6]);
        for (i = 1; i < 8; i += 2) {
            temp1 = 2 * parseInt(temp[i]);
            temp1 += '';
            temp1 = temp1.substring(0,1);
            temp2 = 2 * parseInt(temp[i]);
            temp2 += '';
            temp2 = temp2.substring(1,2);
            if (temp2 == '') {
                temp2 = '0';
            }
            suma += (parseInt(temp1) + parseInt(temp2));
        }
        suma += '';
        n = 10 - parseInt(suma.substring(suma.length-1, suma.length));
        //si no tiene un formato valido devuelve error
        if ((!/^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$/.test(temp) && !/^[T]{1}[A-Z0-9]{8}$/.test(temp)) && !/^[0-9]{8}[A-Z]{1}$/.test(temp)) {
            if ((temp.length == 9) && (/^[0-9]{9}$/.test(temp))) {
                var posicion = temp.substring(8,0) % 23;
                var letra = cadenadni.charAt(posicion);
                var letradni = temp.charAt(8);
                alert("La letra del NIF no es correcta. " + letradni + " es diferente a " + letra);
                jQuery('#'+a).val(temp.substr(0,8) + letra);
                resul = false;
            } else if (temp.length == 8) {
                if (/^[0-9]{1}/.test(temp)) {
                    var posicion = temp.substring(8,0) % 23;
                    var letra = cadenadni.charAt(posicion);
                    var tipo = 'NIF';
                } else if (/^[KLM]{1}/.test(temp)) {
                    var letra = String.fromCharCode(64 + n);
                    var tipo = 'NIF';
                } else if (/^[ABCDEFGHJNPQRSUVW]{1}/.test(temp)) {
                    var letra = String.fromCharCode(64 + n);
                    var tipo = 'CIF';
                } else if (/^[T]{1}/.test(temp)) {
                    var letra = String.fromCharCode(64 + n);
                    var tipo = 'NIE';
                } else if (/^[XYZ]{1}/.test(temp)) {
                    var pos = str_replace(['X', 'Y', 'Z'], ['0','1','2'], temp).substring(0, 8) % 23;
                    var letra = cadenadni.substring(pos, pos + 1);
                    var tipo = 'NIE';
                }
                if (letra !== '') {
                    alert("AÃ±adido la letra del " + tipo + ": " + letra);
                    jQuery('#'+a).val(temp + letra);
                } else {
                    alert ("El CIF/NIF/NIE tiene que tener 9 caracteres");
                    jQuery('#'+a).val(temp);
                }
                resul = false;
            } else if (temp.length < 8) {
                alert ("El CIF/NIF/NIE tiene que tener 9 caracteres");
                jQuery('#'+a).val(temp);
                resul = false;
            } else {
                alert ("CIF/NIF/NIE incorrecto");
                jQuery('#'+a).val(temp);
                resul = false;
            }
        }
        //comprobacion de NIFs estandar
        else if (/^[0-9]{8}[A-Z]{1}$/.test(temp)) {
            var posicion = temp.substring(8,0) % 23;
            var letra = cadenadni.charAt(posicion);
            var letradni = temp.charAt(8);
            if (letra == letradni) {
                return 1;
            } else if (letra != letradni) {
                alert("La letra del NIF no es correcta. " + letradni + " es diferente a " + letra);
                jQuery('#'+a).val(temp.substr(0,8) + letra);
                resul = false;
            } else {
                alert ("NIF incorrecto");
                jQuery('#'+a).val(temp);
                resul = false;
            }
        }
        //comprobacion de NIFs especiales (se calculan como CIFs)
        else if (/^[KLM]{1}/.test(temp)) {
            if (temp[8] == String.fromCharCode(64 + n)) {
                return 1;
            } else if (temp[8] != String.fromCharCode(64 + n)) {
                alert("La letra del NIF no es correcta. " + temp[8] + " es diferente a " + String.fromCharCode(64 + n));
                jQuery('#'+a).val(temp.substr(0,8) + String.fromCharCode(64 + n));
                resul = false;
            } else {
                alert ("NIF incorrecto");
                jQuery('#'+a).val(temp);
                resul = false;
            }
        }
        //comprobacion de CIFs
        else if (/^[ABCDEFGHJNPQRSUVW]{1}/.test(temp)) {
            var temp_n = n + '';
            if (temp[8] == String.fromCharCode(64 + n) || temp[8] == parseInt(temp_n.substring(temp_n.length-1, temp_n.length))) {
                return 2;
            } else if (temp[8] != String.fromCharCode(64 + n)) {
                alert("La letra del CIF no es correcta. " + temp[8] + " es diferente a " + String.fromCharCode(64 + n));
                jQuery('#'+a).val(temp.substr(0,8) + String.fromCharCode(64 + n));
                resul = false;
            } else if (temp[8] != parseInt(temp_n.substring(temp_n.length-1, temp_n.length))) {
                alert("La letra del CIF no es correcta. " + temp[8] + " es diferente a " + parseInt(temp_n.substring(temp_n.length-1, temp_n.length)));
                jQuery('#'+a).val(temp.substr(0,8) + parseInt(temp_n.substring(temp_n.length-1, temp_n.length)));
                resul = false;
            } else {
                alert ("CIF incorrecto");
                jQuery('#'+a).val(temp);
                resul = false;
            }
        }
        //comprobacion de NIEs
        //T
        else if (/^[T]{1}/.test(temp)) {
            if (temp[8] == /^[T]{1}[A-Z0-9]{8}$/.test(temp)) {
                return 3;
            } else if (temp[8] != /^[T]{1}[A-Z0-9]{8}$/.test(temp)) {
                var letra = String.fromCharCode(64 + n);
                var letranie = temp.charAt(8);
                if (letra != letranie) {
                    alert("La letra del NIE no es correcta. " + letranie + " es diferente a " + letra);
                    jQuery('#'+a).val(temp.substr(0,8) + letra);
                    resul = false;
                } else {
                    alert ("NIE incorrecto");
                    jQuery('#'+a).val(temp);
                    resul = false;
                }
            }
        }
        //XYZ
        else if (/^[XYZ]{1}/.test(temp)) {
            var pos = str_replace(['X', 'Y', 'Z'], ['0','1','2'], temp).substring(0, 8) % 23;
            var letra = cadenadni.substring(pos, pos + 1);
            var letranie = temp.charAt(8);
            if (letranie == letra) {
                return 3;
            } else if (letranie != letra) {
                alert("La letra del NIE no es correcta. " + letranie + " es diferente a " + letra);
                jQuery('#'+a).val(temp.substr(0,8) + letra);
                resul = false;
            } else {
                alert ("NIE incorrecto");
                jQuery('#'+a).val(temp);
                resul = false;
            }
        }
    }
    if (!resul) {      
        jQuery('#'+a).focus();
        return resul;
    }
}
 