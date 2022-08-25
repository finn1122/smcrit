package com.example.smcrit;

import androidx.appcompat.app.AppCompatActivity;
import androidx.swiperefreshlayout.widget.SwipeRefreshLayout;

import android.content.Context;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.os.Handler;
import android.util.Log;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {



    //URL
    //String BASE_URL = "http://201.122.204.4:49999/smcrit/";
    private boolean isError = false;
    private static final String TAG = "MainActivity";
    private WebView webView;

    private SwipeRefreshLayout refreshLayout;



    private Context thisContext = this;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        webView = (WebView) findViewById(R.id.webView);

        webView.setWebViewClient(new WebViewClient(){

        @Override
        public void onReceivedError(WebView webView, int errorCode, String description, String failingUrl) {
            super.onReceivedError(webView, errorCode, description, failingUrl);
            Log.e(TAG, "onReceivedError Old = " + errorCode);
            if (errorCode == -2) {
                isError = true;
                if (isError == true){
                    webView.loadUrl("file:///android_asset/www/servidorNoResponde.html");

                }

            }
        }
    });

        WebSettings settings = webView.getSettings();
        settings.setJavaScriptEnabled(true);

        //webView.loadUrl(BASE_URL);
        if (isOnline(this)) {
            String url="http://201.122.204.4:49999/smcrit/";
            webView.loadUrl(url);
        } else {

            webView.loadUrl("file:///android_asset/www/sinConexion.html");

        }


        webView.getSettings().setBuiltInZoomControls(true);

        webView.getSettings().setBuiltInZoomControls(false);

        final SwipeRefreshLayout finalMySwipeRefreshLayout1;

        finalMySwipeRefreshLayout1 = findViewById(R.id.Refresh);
        finalMySwipeRefreshLayout1.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                Toast.makeText(getApplicationContext(), "", Toast.LENGTH_SHORT).show();
                new Handler().postDelayed(new Runnable() {
                    @Override
                    public void run() {
                        finalMySwipeRefreshLayout1.setRefreshing(false);
                    }
                },4000);
            }
        });

        finalMySwipeRefreshLayout1.setColorSchemeResources(android.R.color.holo_blue_bright,
            android.R.color.holo_green_light,
                    android.R.color.holo_orange_light,
                    android.R.color.holo_red_light);


        startService(new Intent(thisContext, Servicio.class));

    }

    public  void onBackPressed(){
        if (webView.canGoBack()){
            webView.goBack();
        }else {
            super.onBackPressed();
        }
    }


    public static boolean isOnline(Context context) {
        ConnectivityManager connectivityManager = (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connectivityManager.getActiveNetworkInfo();
        return networkInfo != null && networkInfo.isAvailable() && networkInfo.isConnected();
    }


}



