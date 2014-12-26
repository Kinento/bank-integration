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


class Kinento_Bankintegration_Block_Bind_Main_Widget_Column_Renderer_Status extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
	public function render( Varien_Object $row ) {
		if ( $row->getStatus() == 'certain' ) {
			$value = '<a href="'.$this->getUrl( '*/*/change/status/unbound/url/index/id/'.$row->getId() ).'">'.Mage::helper( 'bankintegration' )->__( 'Decouple' ).'</a>';
		}
		elseif ( $row->getStatus() == 'guess' ) {
			$value = '<a href="'.$this->getUrl( '*/*/change/status/certain/url/index/id/'.$row->getId() ).'">'.Mage::helper( 'bankintegration' )->__( 'Confirm' ).'</a><br>'.Mage::helper( 'bankintegration' )->__( 'or' ).'<br><a href="'.$this->getUrl( '*/*/change/status/unbound/url/index/id/'.$row->getId() ).'">'.Mage::helper( 'bankintegration' )->__( 'Decouple' ).'</a>';
		}
		else {
			$value = '<a href="'.$this->getUrl( '*/*/change/status/neglected/url/index/id/'.$row->getId() ).'">'.Mage::helper( 'bankintegration' )->__( 'Ignore' ).'</a>';
		}

		return $value;
	}
}
?>
