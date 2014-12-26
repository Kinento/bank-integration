<?php
/**
 * Kinento Bank Integration
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @category   Kinento
 * @package    Kinento_Bankintegration
 * @copyright  Copyright (c) 2009-2015 Kinento
 * @license    MIT license
 *
 */


class Kinento_Bankintegration_Block_Bind_Main_Widget_Column_Renderer_Bindmanual extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
	public function __construct() {
	}

	public function render( Varien_Object $row ) {
		if ( $row->getStatus() == 'unbound' ) {
			$form = '<form action="'.$this->getUrl( '*/*/manualBind/id/'.$row->getId().'' ).'" method="post"><input type="text" name="bind" size="16"><input name="form_key" type="hidden" value="'.Mage::getSingleton( 'core/session' )->getFormKey().'"/></input><input type="submit" value="OK"></form>';
		}
		else {
			$form = '';
		}
		return $form;
	}

}

?>
