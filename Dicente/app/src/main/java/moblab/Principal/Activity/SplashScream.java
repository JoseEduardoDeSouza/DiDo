package moblab.Principal.Activity;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.ImageView;

import moblab.Principal.R;

public class SplashScream extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splash_scream);

        Animation animation1;

        ImageView image = (ImageView)findViewById(R.id.didoSplash);

        animation1 = AnimationUtils.loadAnimation(getApplicationContext(),R.anim.scale);
        image.startAnimation(animation1);

        Thread myThread = new Thread(){
            @Override
            public void run() {
                try {
                    sleep(500);
                    Intent intent = new Intent(SplashScream.this,TurmaActivity.class);
                    startActivity(intent);
                    finish();
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }
        };
        myThread.start();

    }
}
