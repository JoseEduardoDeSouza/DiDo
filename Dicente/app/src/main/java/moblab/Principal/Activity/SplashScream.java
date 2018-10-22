package moblab.Principal.Activity;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

import moblab.Principal.R;

public class SplashScream extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splash_scream);
        Intent intent = new Intent(this,TurmaActivity.class);
        startActivity(intent);
        finish();
    }
}
