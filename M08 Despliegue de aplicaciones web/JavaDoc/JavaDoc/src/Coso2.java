/**
 * 
 * @author Marc Ariza
 * @version 1.0
 *
 */

public class Coso2 extends Coso1 {

	private int cantidad;

	/**
	 * @param Construye Coso2 pas�ndole un int como par�metro
	 */
	public Coso2(int cantidad) {
		super();
		this.cantidad = cantidad;
	}

	/**
	 * @return Devuelve la cantidad
	 */
	public int getCantidad() { return cantidad; }

	/**
	 * @return Devuelve la cantidad
	 */
	public void setCantidad(int cantidad) { this.cantidad = cantidad; }
	
	public static void losCososMandanACallarAToni() {
		
		System.out.println("Toni c�llate");
		
	}
	
	public static void toniNoSeCalla() {
		
		System.out.println("Yo soy el fuego que arde...");
		
	}
	
}
