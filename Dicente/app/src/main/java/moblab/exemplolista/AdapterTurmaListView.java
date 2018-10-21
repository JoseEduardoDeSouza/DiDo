package moblab.exemplolista;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import java.util.List;

public class AdapterTurmaListView extends BaseAdapter {

    private List<TurmaListView> listaItens;
    private LayoutInflater inflater;

    public AdapterTurmaListView(Context contexto, List<TurmaListView> listaItens) {
        this.listaItens = listaItens;
        this.inflater = LayoutInflater.from(contexto);
    }

    @Override
    public int getCount() {
        return listaItens.size();
    }

    @Override
    public Object getItem(int posicao) {
        return listaItens.get(posicao);
    }

    @Override
    public long getItemId(int posicao) {
        return posicao;
    }

    @Override
    public View getView(int i, View view, ViewGroup viewGroup) {
        AdapterTurmaListView.ItemSuporte itemSuporte;

        if (view == null) {
            view = inflater.inflate(R.layout.turma_itens, null);

            itemSuporte = new AdapterTurmaListView.ItemSuporte();
            itemSuporte.turmaView = ((TextView) view.findViewById(R.id.turma));

            view.setTag(itemSuporte);
        }
        else {
            itemSuporte = (AdapterTurmaListView.ItemSuporte) view.getTag();
        }
        TurmaListView item = listaItens.get(i);
        itemSuporte.turmaView.setText(item.getAno());

        return view;
    }

   class ItemSuporte {
        public TextView turmaView;
    }
}
