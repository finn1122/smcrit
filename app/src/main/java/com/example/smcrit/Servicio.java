package com.example.smcrit;

import androidx.core.app.NotificationCompat;


import android.app.Notification;
import android.app.NotificationChannel;
import android.app.NotificationManager;
import android.app.Service;
import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.os.Build;

import android.os.AsyncTask;
import android.os.Bundle;

import java.io.BufferedReader;
import android.os.IBinder;
import android.os.StrictMode;
import android.widget.Toast;

import androidx.annotation.Nullable;
import androidx.core.app.NotificationCompat;
import androidx.core.app.NotificationManagerCompat;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;


import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;

public class Servicio extends Service {

    private final static String CHANNEL_ID = "NOTIFICACION";
    private final static int NOTIFICACION_ID = 0;


    @Override
    public void  onCreate(){


    }



    @Override
    public int onStartCommand(Intent intent, int flag, int idProcess){
        ejecutar();
        return Service.START_STICKY;
    }

    @Override
    public void onDestroy(){

    }

    @Nullable
    @Override
    public IBinder onBind(Intent intent) {
        return null;
    }



    //Aqui empieza la codificación de los hilos
    public void hilo(){
        try {
            Thread.sleep(1000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }

    public void ejecutar(){
        time time =  new time();
        time.execute();
        //getData();
        createNotificationChannel();
        //createNotificationChannel();
        createNotification();




    }

    public class time extends AsyncTask<Void,Integer,Boolean> {

        @Override
        protected Boolean doInBackground(Void... voids) {
            for (int i=1; i<300; i++ ){
                hilo();
            }
            return true;
        }
        @Override
        protected void onPostExecute(Boolean aBoolean) {
            ejecutar();

        }
    }
    //obtener datos de la aplicacion web SMCRIT
    public void getData(){


    }


    //notificaciones

    public  void createNotification(){
        String sql = "http://201.122.204.4:49999/smcrit/controladores/consultarAlerta.php";
        StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
        StrictMode.setThreadPolicy(policy);

        URL url = null;
        HttpURLConnection conn;

        try{
            url = new URL(sql);
            conn = (HttpURLConnection) url.openConnection();
            conn.setRequestMethod("GET");
            conn.connect();
            BufferedReader in = new BufferedReader(new InputStreamReader(conn.getInputStream()));
            String inputLine;
            StringBuffer response = new StringBuffer();
            String json = "";

            while((inputLine = in.readLine())!= null){
                response.append(inputLine);
            }

            json = response.toString();
            JSONArray jsonArr = null;
            jsonArr = new JSONArray(json);
            String alerta = "";
            String nb_ubicacion = "";
            String nb_dispositivo = "";
            String nb_sensor = "";
            float no_valor = (float) 0.0;
            String fe_registro = "";

            for(int i=0; i<jsonArr.length();i++){
                JSONObject jsonObject = jsonArr.getJSONObject(i);
                alerta += jsonObject.getString("ALERTA");
                nb_ubicacion += jsonObject.getString("NB_UBICACION");
                nb_dispositivo += jsonObject.getString("NB_DISPOSITIVO");
                nb_sensor += jsonObject.getString("NB_SENSOR");
                no_valor += jsonObject.getDouble("NO_VALOR");
                fe_registro += jsonObject.getString("FE_REGISTRO");

            }

            if(alerta.equals("true")){
                //float valor = (float) 12.4;

                //Toast.makeText(getApplicationContext(), "alerta"+ valor,Toast.LENGTH_SHORT).show();

                NotificationCompat.Builder builder = new NotificationCompat.Builder(getApplicationContext(), CHANNEL_ID);
                builder.setSmallIcon(R.drawable.ic_launcher_background);
                builder.setContentTitle("Alerta de " +nb_sensor+" del "+nb_ubicacion);
                if (nb_sensor.equals("Temperatura")){
                    builder.setStyle(new NotificationCompat.BigTextStyle()
                            .bigText("Se ha detectado una lectura "+no_valor+"°C."));
                }
                if (nb_sensor.equals("Humedad")){
                    builder.setStyle(new NotificationCompat.BigTextStyle()
                            .bigText("Se ha detectado una lectura "+no_valor+"% de humedad."));
                }


                builder.setColor(Color.BLUE);
                builder.setPriority(NotificationCompat.PRIORITY_DEFAULT);
                builder.setLights(Color.BLUE, 1000,1000);
                builder.setVibrate(new long[]{1000,1000,1000,1000});
                builder.setDefaults(Notification.DEFAULT_SOUND);

                NotificationManagerCompat notificationManagerCompat = NotificationManagerCompat.from(getApplicationContext());
                notificationManagerCompat.notify(NOTIFICACION_ID, builder.build());

            }




        } catch (ProtocolException e) {
            e.printStackTrace();
        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        } catch (JSONException e) {
            e.printStackTrace();
        }


    }

    private  void createNotificationChannel(){
        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.O){
            CharSequence name = "Notification";
            NotificationChannel notificationChannel = new NotificationChannel(CHANNEL_ID, name, NotificationManager.IMPORTANCE_DEFAULT);
            NotificationManager notificationManager = (NotificationManager) getSystemService(NOTIFICATION_SERVICE);
            notificationManager.createNotificationChannel(notificationChannel);

        }
    }

}
