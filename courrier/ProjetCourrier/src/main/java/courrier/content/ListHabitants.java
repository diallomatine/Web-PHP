package courrier.content;

import java.util.ArrayList;
import java.util.List;

import courrier.Inhabitant;

public class ListHabitants<T> implements Content {
	protected List<Inhabitant> listHabitats;

	public ListHabitants(List<Inhabitant> listHabitats) {
		this.listHabitats = new ArrayList<Inhabitant>(listHabitats);
	}
	public ListHabitants() {
		this.listHabitats = new ArrayList<Inhabitant>();
	}
	public void addHbts(Inhabitant habitant) {
		this.listHabitats.add(habitant);
	}
	public void removeHabitant(int i){
		this.listHabitats.remove(i);
	}
	@Override
	public List<Inhabitant> getContent() {
		return this.listHabitats;
	}

}
