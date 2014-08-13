<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information, see
 * <http://www.doctrine-project.org>.
 */

require_once '../config.php';
$tool = new \Doctrine\ORM\Tools\SchemaTool($em);
$classes = array(
  $em->getClassMetadata('Entities\Cliente')
//   $em->getClassMetadata('Entities\Estoque'),
//   $em->getClassMetadata('Entities\Contatos'),
//   $em->getClassMetadata('Entities\ItensPedidos'),
//   $em->getClassMetadata('Entities\Materiais'),
//   $em->getClassMetadata('Entities\Obras'),
//   $em->getClassMetadata('Entities\Pedidos'),
//   $em->getClassMetadata('Entities\StatusPosse'),
//   $em->getClassMetadata('Entities\FuncionarioEstoque'),
//   $em->getClassMetadata('Entities\Login'),
//   $em->getClassMetadata('Entities\Locacao'),
//    $em->getClassMetadata('Entities\Aquisicao')
// //  $em->getClassMetadata('Entities\ItemAquisicao')
  
  
);
$tool->updateSchema($classes);

