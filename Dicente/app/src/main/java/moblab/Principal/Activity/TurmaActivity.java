package moblab.Principal.Activity;

import android.content.Context;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.ProtocolException;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;

import moblab.Principal.Adapters.AdapterTurmaListView;
import moblab.Principal.Entidades.TurmaListView;
import moblab.Principal.R;

public class TurmaActivity extends AppCompatActivity {
    public static List<TurmaListView> turmas = new ArrayList<TurmaListView>();;
    public static ListView listaView;
    String a="";
    public Context context;
    public static AdapterTurmaListView adaptador;
    public  boolean verificaConexao() {
        boolean conectado;
        ConnectivityManager conectivtyManager = (ConnectivityManager) getSystemService(this.CONNECTIVITY_SERVICE);
        if (conectivtyManager.getActiveNetworkInfo() != null
                && conectivtyManager.getActiveNetworkInfo().isAvailable()
                && conectivtyManager.getActiveNetworkInfo().isConnected()) {
            conectado = true;
        } else {
            conectado = false;
        }
        return conectado;
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_turma);
        this.listaView = (ListView) findViewById(R.id.turmalist);
        context = getApplicationContext();

        new GetData().execute("http://10.42.0.1:8080/sistema/obterTurmas/");
        getSupportActionBar().setTitle("Selecione sua Turma.");

        listaView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                TurmaListView item = (TurmaListView) adapterView.getItemAtPosition(i);

                Intent intent = new Intent(TurmaActivity.this,MainActivity.class);
                intent.putExtra("turma", item.getId());

                startActivity(intent);
                finish();
            }
        });


    }



    private class GetData extends AsyncTask<String, Integer, String> {
        protected String doInBackground(String... urls) {
            URL url = null;
            String content = "";
            try {
                url = new URL(urls[0]);

                HttpURLConnection connection = (HttpURLConnection) url.openConnection();
                connection.setRequestMethod("GET");
                connection.setDoOutput(true);
                connection.setConnectTimeout(5000);
                connection.setReadTimeout(5000);
                connection.connect();
                BufferedReader rd = new BufferedReader(new InputStreamReader(connection.getInputStream()));
                String line;
                while ((line = rd.readLine()) != null) {
                    content += line + "\n";
                }
            } catch (MalformedURLException e) {
                Log.d("requisi1",e.toString());
                e.printStackTrace();
            } catch (ProtocolException e) {
                Log.d("requisi2",e.toString());
                e.printStackTrace();
            } catch (IOException e) {
                Log.d("requisi3",e.toString());
                e.printStackTrace();
            }

            return content;
        }

        protected void onProgressUpdate(Integer... progress) {
        }

        protected void onPostExecute(String result) {

            try {
                JSONArray jsonarray = new JSONArray(result);
                for (int i = 0; i < jsonarray.length(); i++) {
                    JSONObject jsonobject = jsonarray.getJSONObject(i);
                    String id = jsonobject.getString("id");
                    String ano = jsonobject.getString("ano");
                    String curso = jsonobject.getString("curso");


                    TurmaListView tlv = new TurmaListView(id,ano,curso);
                    turmas.add(tlv);

                    TurmaActivity.this.runOnUiThread(new Runnable() {
                        @Override
                        public void run() {
                            adaptador = new AdapterTurmaListView(TurmaActivity.this, turmas);
                            listaView.setAdapter(adaptador);

                        }
                    });



                }

            } catch (JSONException e) {
                e.printStackTrace();
            }



        }


    }
}
