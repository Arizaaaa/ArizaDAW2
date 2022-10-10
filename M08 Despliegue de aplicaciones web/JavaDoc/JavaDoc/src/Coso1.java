/**
 * 
 * @author Marc Ariza
 * @version 1.0
 *
 */

public class Coso1 implements CosoInterface {
	
	private int variable1;
	private String variable2;
	private Boolean variable3;
	
	public Coso1() {
		
		this.variable1 = 5;
		this.variable2 = "Adaji";
		this.variable3 = true;
		
	}

	/**
	 * @return Devuelve la variable 1
	 */
	public int getVariable1() {	return variable1; }
	
	/**
	 * @param Setter para actualizar la variable 1
	 */
	public void setVariable1(int variable1) { this.variable1 = variable1; }

	/**
	 * @return Devuelve la variable 2
	 */
	public String getVariable2() { return variable2; }
	
	/**
	 * @param Setter para actualizar la variable 2
	 */
	public void setVariable2(String variable2) { this.variable2 = variable2; }

	/**
	 * @return Devuelve la variable 3
	 */
	public Boolean getVariable3() { return variable3; }
	
	/**
	 * @param Setter para actualizar la variable 3
	 */
	public void setVariable3(Boolean variable3) { this.variable3 = variable3; }
	
	/**
	 * @param Método para printar
	 */
	public void losCososQuierenCosas(int num) {
		
		System.out.println("Los cosos hacen " + num + " cosas");
		
	}
	
	/**
	 * @return Devuelve una cadena de texto
	 */
	public String losCososDevuelvenCosas() {
		
		return "Devolvido";
		
	}
	
	/**
	 * @throws Lanza una excepción 
	 */
	public void losCososHacenExcepciones() {
		
		throw new RuntimeException("Excepcion devolvida");
		
	}

	@Override
	public void nanai() {

		System.out.println(getVariable2() + " nanai");
		
	}

	@Override
	public void sisi() {
		
		System.out.println(getVariable2() + " sisi");

	}
	
}
