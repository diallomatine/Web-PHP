package courrier.content;

public class Money<T> implements Content<T>{
	protected T money;

	/**
	 * Built the type money of content
	 * @param money the money to must be the content of this letter
	*/
	public Money(T money) {
		this.money = money;
	}

	
	/**
	 * @return the money content of this letter
	*/
	
	public T getContent() {
		return this.money;
	}

}
